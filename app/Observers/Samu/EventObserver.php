<?php

namespace App\Observers\Samu;

use App\Models\Samu\Event;
use App\Models\Samu\EventCounter;
use App\Models\Samu\EventUser;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;

class EventObserver
{
    /**
     * Handle the Event "creating" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        $shift = Shift::whereStatus(true)->first();

        // Event information
        $counter = EventCounter::useNext();
        $event->counter   = $counter->counter;
        $event->date      = $counter->date;

        $event->creator()->associate(auth()->user());
        $event->shift()->associate($shift);

        $isMobileInService = $shift->MobilesInService->where('mobile_id', $event->mobile_id)->first();

        if($isMobileInService)
            $event->mobileInService()->associate($isMobileInService);

        // Order the mobiles
        if($shift && $event->mobileInService)
        {
            $newPosition = $shift->mobilesInService->where('status', true)->count() + 1;

            $mobileExit = $event->mobileInService;
            $mobileExit->update([
                'position' => $newPosition
            ]);

            MobileInService::reorder($shift);
        }
    }

    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $shift = Shift::whereStatus(true)->first();
        $isMobileInService = $shift->MobilesInService->where('mobile_id', $event->mobile_id)->first();

        if($isMobileInService)
        {
            foreach($isMobileInService->currentCrew as $mobilecrew)
            {
                EventUser::create([
                    'event_id'              => $event->id,
                    'user_id'               => $mobilecrew->pivot->user_id,
                    'job_type_id'           => $mobilecrew->pivot->job_type_id
                ]);
            }
        }
    }
}
