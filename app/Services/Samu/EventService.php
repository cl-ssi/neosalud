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
            foreach($this->dataVitalSign['registered_at'] as $index => $registered_at)
            {
                $dataVitalSign['fc'] = $this->dataVitalSign['fc'][$index];
                $dataVitalSign['fr'] = $this->dataVitalSign['fr'][$index];
                $dataVitalSign['pa'] = $this->dataVitalSign['pa'][$index];
                $dataVitalSign['pam'] = $this->dataVitalSign['pam'][$index];
                $dataVitalSign['gl'] = $this->dataVitalSign['gl'][$index];
                $dataVitalSign['soam'] = $this->dataVitalSign['soam'][$index];
                $dataVitalSign['soap'] = $this->dataVitalSign['soap'][$index];
                $dataVitalSign['hgt'] = $this->dataVitalSign['hgt'][$index];
                $dataVitalSign['fill_capillary'] = $this->dataVitalSign['fill_capillary'][$index];
                $dataVitalSign['t'] = $this->dataVitalSign['t'][$index];
                $dataVitalSign['registered_at'] = $registered_at;

                $vitalSign = VitalSign::create($dataVitalSign);
                $newEvent->vitalSigns()->save($vitalSign);
                $newEvent->save();
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
        $this->getDataVitalSign($dataValidated);
        $this->dataEvent['status'] = ($dataValidated["save_close"] == "yes") ? false : $event->status;
        $event->update($this->dataEvent);

        $this->deleteVitalSigns($event);

        if($this->notEmptyVitalSign($dataValidated))
        {
            foreach($this->dataVitalSign['ids'] as $index => $id)
            {
                $vitalSign = VitalSign::findOrNew($id);

                $dataVitalSign['fc'] = $this->dataVitalSign['fc'][$index];
                $dataVitalSign['fr'] = $this->dataVitalSign['fr'][$index];
                $dataVitalSign['pa'] = $this->dataVitalSign['pa'][$index];
                $dataVitalSign['pam'] = $this->dataVitalSign['pam'][$index];
                $dataVitalSign['gl'] = $this->dataVitalSign['gl'][$index];
                $dataVitalSign['soam'] = $this->dataVitalSign['soam'][$index];
                $dataVitalSign['soap'] = $this->dataVitalSign['soap'][$index];
                $dataVitalSign['hgt'] = $this->dataVitalSign['hgt'][$index];
                $dataVitalSign['fill_capillary'] = $this->dataVitalSign['fill_capillary'][$index];
                $dataVitalSign['t'] = $this->dataVitalSign['t'][$index];
                $dataVitalSign['registered_at'] = $this->dataVitalSign['registered_at'][$index];

                $vitalSign->fill($dataVitalSign);
                $vitalSign->save();

                $event->vitalSigns()->save($vitalSign);
                $event->save();
            }
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
     * @return void
     */
    public function getDataVitalSign($dataValidated)
    {
        if(array_key_exists('registered_at',  $dataValidated))
        {
            $this->dataVitalSign['ids'] = $dataValidated['ids'];
            $this->dataVitalSign['registered_at'] = $dataValidated['registered_at'];
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
        }

        $this->dataEvent = $dataValidated;
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
        return (isset($dataValidated['registered_at']) && count($dataValidated['registered_at']) > 0);
    }

    /**
     * Delete vital signs
     *
     * @param  \App\Models\Samu\Event  $event
     * @return void
     */
    public function deleteVitalSigns(Event $event)
    {
        $ids = array_key_exists('ids',  $this->dataVitalSign) ? $this->dataVitalSign['ids'] : [];
        $collectionIds = collect($ids);

        foreach($event->vitalSigns as $vitalSign)
        {
            if($collectionIds->search($vitalSign->id) === false)
                $vitalSign->delete();
        }
    }
}
