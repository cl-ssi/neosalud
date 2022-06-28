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
    public function create(Event $event = null, Call $call = null, $dataValidated)
    {
        $this->getDataVitalSign($dataValidated);
        $this->getTimestamps($event, $dataValidated);

        $callRelationed = $event ? $event->call : $call;
        $newEvent = Event::create($this->dataEvent);
        $newEvent->call()->associate($callRelationed);
        $newEvent->save();

        if($this->notEmptyVitalSign($dataValidated))
        {
            $vitalSign = VitalSign::create($this->dataVitalSign);
            $newEvent->vitalSign()->save($vitalSign);
            $newEvent->save();
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
        $this->getDataVitalSign($dataValidated, $event);
        $this->dataEvent['status'] = ($dataValidated["save_close"] == "yes") ? false : $event->status;
        $event->update($this->dataEvent);

        if($this->notEmptyVitalSign($dataValidated))
        {
            $vitalSign = VitalSign::findOrNew(optional($event->vitalSign)->id);
            $vitalSign->fill($this->dataVitalSign);
            $vitalSign->save();

            $event->vitalSign()->save($vitalSign);
            $event->save();
        }

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
     * Get field of event and vital sign from dataValidated
     *
     * @param  array  $dataValidated
     * @param  \App\Models\Samu\Event  $event
     * @return void
     */
    public function getDataVitalSign($dataValidated, Event $event = null)
    {
        $this->dataVitalSign['fc'] = $dataValidated['fc'];
        $this->dataVitalSign['fr'] = $dataValidated['fr'];
        $this->dataVitalSign['pa'] = $dataValidated['pa'];
        $this->dataVitalSign['pam'] = $dataValidated['pam'];
        $this->dataVitalSign['gl'] = $dataValidated['gl'];
        $this->dataVitalSign['soam'] = $dataValidated['soam'];
        $this->dataVitalSign['soap'] = $dataValidated['soap'];
        $this->dataVitalSign['hgt'] = $dataValidated['hgt'];
        $this->dataVitalSign['fill_capillary'] = $dataValidated['fill_capillary'];
        $this->dataVitalSign['t'] = $dataValidated['t'];

        if($dataValidated['registered_at'])
        {
            $date = $this->getDateRegisteredAt($event);
            $this->dataVitalSign['registered_at'] = $date . $dataValidated['registered_at'];
        }

        unset($dataValidated['fc']);
        unset($dataValidated['fr']);
        unset($dataValidated['pa']);
        unset($dataValidated['pam']);
        unset($dataValidated['gl']);
        unset($dataValidated['soam']);
        unset($dataValidated['soap']);
        unset($dataValidated['hgt']);
        unset($dataValidated['fill_capillary']);
        unset($dataValidated['t']);
        unset($dataValidated['registered_at']);

        $this->dataEvent = $dataValidated;
    }

    /**
     * Get the date for the registered_at
     *
     * @param  \App\Models\Samu\Event  $event
     * @return string
     */
    public function getDateRegisteredAt(Event $event = null)
    {
        $date = now()->format('Y-m-d ');
        if($event && $event->vitalSign && $event->vitalSign->registered_at)
            $date = $event->vitalSign->registered_at->format('Y-m-d ');
        return $date;
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

    /**
     * Checks if at least one data of the vital signs are defined
     *
     * @param  array  $dataValidated
     * @return boolean
     */
    public function notEmptyVitalSign($dataValidated)
    {
        return (
            $dataValidated['fc'] ||
            $dataValidated['fr'] ||
            $dataValidated['pa'] ||
            $dataValidated['pam'] ||
            $dataValidated['gl'] ||
            $dataValidated['soam'] ||
            $dataValidated['soap'] ||
            $dataValidated['hgt'] ||
            $dataValidated['fill_capillary'] ||
            $dataValidated['t']
        );
    }
}
