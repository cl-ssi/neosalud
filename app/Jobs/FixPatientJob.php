<?php

namespace App\Jobs;

use App\Models\Samu\Event;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FixPatientJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $event;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $event = Event::find($this->event->id);
        $urlWs = env('WSSSI_URL').'/fonasa';
        $content = explode("-", $event->patient_identification);
        $run = $content[0];
        $dv = $content[1];

        /** Solo si está en null */
        if(is_null($event->verified_fonasa_at))
        {
            $response = Http::get($urlWs, ['run' => $run, 'dv' => $dv]);

            if($response->status() == 200)
            {
                $patient = $response->object();

                if($this->validData($patient))
                {
                    $event->update([
                        'patient_name' => "$patient->name $patient->fathers_family $patient->mothers_family",
                        'birthday' => $patient->birthday,
                        'gender_id' => ($patient->gender == "Masculino") ? 1 : 2,
                        'prevision' => $patient->prevision,
                        'verified_fonasa_at' => now()
                    ]);

                    $events_similar = Event::where('patient_identification','=',$event->patient_identification)->get();
                    foreach($events_similar as $similar)
                    {
                        $similar->update([
                            'patient_name' => "$patient->name $patient->fathers_family $patient->mothers_family",
                            'birthday' => $patient->birthday,
                            'gender_id' => ($patient->gender == "Masculino") ? 1 : 2,
                            'prevision' => $patient->prevision,
                            'verified_fonasa_at' => now(),
                            'run_fixed' => true,
                        ]);
                    }
                }
            }
            else
            {
                $msg = 'La solicitud http a fonasa arrojo un estatus ' . $response->status();
                $e = new Exception($msg);
                Log::error($msg, ['id_event' => $event->id, 'run' => $event->patient_identification]);
                $this->fail($e);
            }
        }
    }

    public function validData($patient)
    {
        $validBirthday = false;
        $validGender = false;
        $genders = ["Masculino", "Femenino"];

        if(preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $patient->birthday))
            $validBirthday = true;
        else
            $msg = 'El paciente tiene una fecha de nacimiento errada';

        if(in_array($patient->gender, $genders))
            $validGender = true;
        else
            $msg = 'El paciente tiene un género errado';

        if(!$validBirthday || !$validGender)
            Log::error($msg, (array)$patient);

        return $validBirthday && $validGender;
    }
}
