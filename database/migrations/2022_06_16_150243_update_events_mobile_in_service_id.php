<?php

use App\Models\Samu\Event;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventsMobileInServiceId extends Migration
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
            ->whereNotNull('samu_events.mobile_in_service_id')
            ->whereNotNull('samu_events.mobile_id')
            ->join('samu_mobiles_in_service', 'samu_mobiles_in_service.id', '=', 'samu_events.mobile_in_service_id')
            ->whereRaw('samu_events.mobile_id != samu_mobiles_in_service.mobile_id')
            ->select([
                'samu_events.shift_id as shift_id',
                'samu_events.id as event_id',
                'samu_events.mobile_id as mobile_id',
                'samu_events.mobile_in_service_id as mis_id',
            ])
            ->get();

        foreach($events as $item)
        {
            $mobile_in_service_id = null;

            $mobile = Mobile::find($item->mobile_id);
            if($mobile->managed == 1)
            {
                $mobileInService = MobileInService::whereShiftId($item->shift_id)->whereMobileId($item->mobile_id)->first();

                if($mobileInService)
                    $mobile_in_service_id = $mobileInService->id;
            }

            $event = Event::find($item->event_id);
            $event->update([
                'mobile_in_service_id' => $mobile_in_service_id
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
