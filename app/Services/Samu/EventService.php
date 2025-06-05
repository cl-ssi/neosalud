<?php

namespace App\Services\Samu;

use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\MobileInService;
use App\Models\Samu\VitalSign;
use Illuminate\Support\Carbon;

class EventService
{
    public $dataVitalSign = [];
    public $dataEvent = [];

    /**
     * Method to create an Event
     *
     * @param  \App\Models\Samu\Event  $event
     * @param  \App\Models\Samu\Call  $call
     * @param  array  $dataValidated
     * @return void
     */
    public function create(Event $event = null, Call $call = null, $dataValidated, $vitalSignsIds = [])
    {
        
        $this->getTimestamps($event, $dataValidated);

        $callRelationed = $event ? $event->call : $call;
        $newEvent = Event::create($this->dataEvent);
        $newEvent->call()->associate($callRelationed);
        $newEvent->save();
        if($vitalSignsIds)
        {
            foreach($vitalSignsIds as $vitalSignId)
            {
                $vitalSign = VitalSign::find($vitalSignId);
                if($vitalSign)
                {
                    $newEvent->vitalSigns()->attach($vitalSign);
                }
            }
        }
        
    }

    /**
     * Method to update an Event
     *
     * @param  \App\Models\Samu\Event  $event
     * @param  array  $dataValidated
     * @return void
     */
    public function update(Event $event, $dataValidated)
    {
        
        $this->dataEvent['status'] = ($dataValidated["save_close"] == "yes") ? false : $event->status;
        $event->update($this->dataEvent);

        

        $mobileInService = MobileInService::whereShiftId($event->shift->id)->whereMobileId($dataValidated['mobile_id'])->first();

        if($mobileInService)
        {
            $event->mobileInService()->associate($mobileInService);
            $event->save();
        }
        else
        {
            $event->mobileInService()->dissociate();
            $event->save();
        }
    }

    
    /**
     * Get the timestamp of the event
     *
     * @param  \App\Models\Samu\Event  $event
     * @param  array  $dataValidated
     * @return void
     */
    public function getTimestamps(Event $event = null, $dataValidated)
    {
        $this->dataEvent['departure_at'] = $this->getDate($event, $dataValidated['departure_at']);
        $this->dataEvent['mobile_departure_at'] = $this->getDate($event, $dataValidated['mobile_departure_at']);
        $this->dataEvent['mobile_arrival_at'] = $this->getDate($event, $dataValidated['mobile_arrival_at']);
        $this->dataEvent['route_to_healtcenter_at'] = $this->getDate($event, $dataValidated['route_to_healtcenter_at']);
        $this->dataEvent['healthcenter_at'] = $this->getDate($event, $dataValidated['healthcenter_at']);
        $this->dataEvent['patient_reception_at'] = $this->getDate($event, $dataValidated['patient_reception_at']);
    }

    /**
     * Get the timestamp of the event
     *
     * @param  \App\Models\Samu\Event  $event|null
     * @param  string  $date
     * @return void
     */
    public function getDate(Event $event = null, $date)
    {
        $datetime = null;
        if($date)
        {
            if($event)
            {
                if($event->date->toDateString() == now()->toDateString())
                    $datetime = Carbon::parse($event->date->format('Y-m-d ') . $date);
                else
                    $datetime = Carbon::parse($date);
            }
            else
                $datetime = Carbon::parse(now()->format('Y-m-d ') . $date);
        }

        return $datetime;
    }
}
