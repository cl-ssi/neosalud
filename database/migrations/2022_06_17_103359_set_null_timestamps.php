<?php

use App\Models\Samu\Event;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetNullTimestamps extends Migration
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

        $events = Event::query()
            ->whereTime('departure_at', '=', '00:00:00')
            ->orWhereTime('mobile_departure_at', '=', '00:00:00')
            ->orWhereTime('mobile_arrival_at', '=', '00:00:00')
            ->orWhereTime('route_to_healtcenter_at', '=', '00:00:00')
            ->orWhereTime('healthcenter_at', '=', '00:00:00')
            ->orWhereTime('patient_reception_at', '=', '00:00:00')
            ->orWhereTime('return_base_at', '=', '00:00:00')
            ->orWhereTime('on_base_at', '=', '00:00:00')
            ->get();

        foreach($events as $event)
        {
            if($event->departure_at && $event->departure_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'departure_at' => null
                ]);
            }

            if($event->mobile_departure_at && $event->mobile_departure_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'mobile_departure_at' => null
                ]);
            }

            if($event->mobile_arrival_at && $event->mobile_arrival_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'mobile_arrival_at' => null
                ]);
            }

            if($event->route_to_healtcenter_at && $event->route_to_healtcenter_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'route_to_healtcenter_at' => null
                ]);
            }

            if($event->healthcenter_at && $event->healthcenter_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'healthcenter_at' => null
                ]);
            }

            if($event->patient_reception_at && $event->patient_reception_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'patient_reception_at' => null
                ]);
            }

            if($event->return_base_at && $event->return_base_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'return_base_at' => null
                ]);
            }

            if($event->on_base_at && $event->on_base_at->format('H:i:s') == '00:00:00')
            {
                $event->update([
                    'on_base_at' => null
                ]);
            }
        }

        // Re-enable auditing
        Event::enableAuditing();
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
