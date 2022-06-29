<?php

use App\Models\Samu\Event;
use App\Models\Samu\MobileInService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventsMobileId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Disable auditing
        Event::disableAuditing();

        $events = Event::query()
            ->whereNotNull('samu_events.mobile_id')
            ->whereNull('samu_events.mobile_in_service_id')
            ->join('samu_mobiles', 'samu_mobiles.id', '=', 'samu_events.mobile_id')
            ->where('samu_mobiles.managed', '=', '1')
            ->select([
                'samu_events.id as event_id',
                'samu_events.mobile_id as mobile_id',
                'samu_events.shift_id as shift_id'
            ])
            ->get();

        foreach($events as $item)
        {
            $mobileInService = MobileInService::whereShiftId($item->shift_id)->whereMobileId($item->mobile_id)->first();

            $event = Event::find($item->event_id);
            $event->update([
                'mobile_in_service_id' => ($mobileInService != null) ? $mobileInService->id : null
            ]);
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
