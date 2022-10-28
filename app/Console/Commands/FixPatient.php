<?php

namespace App\Console\Commands;

use App\Helpers\Run;
use App\Jobs\FixPatientJob;
use App\Models\Samu\Event;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class FixPatient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'patient:fix {year} {month}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Select patients and add them to the work queue';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $year = $this->argument('year');
        $month = $this->argument('month');

        $events = Event::query()
            ->whereNull('run_fixed')
            ->whereNull('verified_fonasa_at')
            ->whereNotNull('patient_identification')
            ->wherePatientIdentifierTypeId(1)
            ->when($year && $month, function($query) use($year, $month) {
                $query->whereYear('created_at', $year)
                    ->whereMonth('created_at', $month);
            })
            ->get();


        foreach($events as $event)
        {
            $identification = $this->getPatienIdentification($event->patient_identification);
            $event->update([
                'patient_identification' => $identification
            ]);

            $dv = substr($event->patient_identification, -1);
            $run = substr($event->patient_identification, 0, -1);

            if(Run::verify($run, $dv))
            {
                FixPatientJob::dispatch($event);

                $event->update([
                    'patient_identification' => "$run-$dv",
                    'run_fixed' => true,
                ]);
            }
            else
            {
                $event->update([
                    'run_fixed' => false,
                ]);
            }
        }

        $this->info($events->count() . " patients were added to the queue");
    }

    public function getPatienIdentification($identification)
    {
        $identification = preg_replace('/[^0-9K]/', '', $identification);
        return Str::upper($identification);
    }
}
