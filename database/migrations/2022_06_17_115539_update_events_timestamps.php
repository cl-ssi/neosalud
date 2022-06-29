<?php

use App\Models\Samu\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateEventsTimestamps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Disable auditing from this point on
        Event::disableAuditing();

        // Primero cambiar la fecha del departure_at con la fecha del evento
        $events = Event::whereNotNull('departure_at')->get();

        foreach($events as $event)
        {
            $date = $event->date->format('Y-m-d ') . $event->departure_at->format('H:i:s');
            $event->update([
                'departure_at' => Carbon::parse($date),
            ]);
        }

        // Actualizar todas las marcas de tiempo
        $events = Event::all();

        foreach($events as $event)
        {
            $event->update([
                'mobile_departure_at' => $this->getDate($event, $event->mobile_departure_at),
                'mobile_arrival_at' => $this->getDate($event, $event->mobile_arrival_at),
                'route_to_healtcenter_at' => $this->getDate($event, $event->route_to_healtcenter_at),
                'healthcenter_at' => $this->getDate($event, $event->healthcenter_at),
                'patient_reception_at' => $this->getDate($event, $event->patient_reception_at),
                'return_base_at' => $this->getDate($event, $event->return_base_at),
                'on_base_at' => $this->getDate($event, $event->on_base_at),
            ]);
        }

        // Re-enable auditing
        Event::enableAuditing();
    }

    public function getDate(Event $event, Carbon $hour = null)
    {
        $datetime = null;
        $date_departure_at = Carbon::parse($event->departure_at);
        $date = $event->date->format('Y-m-d');
        $hour = $hour ? $hour->format('H:i:s') : null;

        if($hour)
        {
            $datetime = Carbon::parse("$date $hour");
            if($datetime->lt($date_departure_at))
                $datetime = $datetime->addDay();
        }
        return $datetime;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
