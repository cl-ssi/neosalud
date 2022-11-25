<?php

namespace App\Http\Livewire\Samu\VitalSign;

use Illuminate\Support\Carbon;
use Livewire\Component;

class Lists extends Component
{
    public $event;
    public $edit;
    public $vitalSigns;

    public $listeners = [
        'addLists',
        'updateVitalSign',
    ];

    public function render()
    {
        return view('livewire.samu.vital-sign.lists');
    }

    public function mount()
    {
        if($this->edit == false)
            $this->vitalSigns = collect([]);
        else
            $this->getVitalSigns();
    }

    public function addLists($vitalSign)
    {
        $this->vitalSigns->push($vitalSign);
        $this->vitalSigns = $this->vitalSigns->sortBy('timestamp')->values();
    }

    public function editVitalSign($index)
    {
        $vitalSign = $this->vitalSigns->values()->get($index);
        $this->emitTo('samu.vital-sign.form', 'loadVitalSign', $vitalSign, $index);
    }

    public function updateVitalSign($vitalSign, $index)
    {
        $this->vitalSigns = $this->vitalSigns->forget($index)->values();
        $this->vitalSigns->push($vitalSign);
        $this->vitalSigns = $this->vitalSigns->sortBy('timestamp')->values();
    }

    public function getVitalSigns()
    {
        $this->vitalSigns = $this->event->vitalSigns->toArray();

        $data = collect([]);
        foreach($this->vitalSigns as $vitalSign)
        {
            $date = Carbon::parse($vitalSign['registered_at']);
            $date->setTimezone(config('app.timezone'));
            $vitalSign['type_input'] = $this->getTypeInput();
            $vitalSign['registered_at_format'] = $this->getRegisteredAtFormat($vitalSign['registered_at']);
            $vitalSign['registered_at'] = ($vitalSign['type_input'] == 'time' ) ? $date->format('H:i') : $date->format('Y-m-d\TH:i');
            $vitalSign['timestamp'] = $date->timestamp;
            $data->push($vitalSign);
        }

        $this->vitalSigns = $data;
        $this->vitalSigns = $this->vitalSigns->sortBy('timestamp')->values();
    }

    public function getTypeInput()
    {
        $created_at = $this->event ? Carbon::parse($this->event->created_at) : null;
        if($this->event == null)
            $typeInput = "time";
        if($created_at && $created_at->format('Y-m-d') == now()->format('Y-m-d'))
            $typeInput = "time";
        else
            $typeInput = "datetime-local";
        return $typeInput;
    }

    public function getRegisteredAtFormat($registered_at)
    {
        $date = Carbon::parse($registered_at);
        $date->setTimezone(config('app.timezone'));
        return  $date->format('Y-m-d H:i');
    }

    public function deleteVitalSign($index)
    {
        $this->vitalSigns = $this->vitalSigns->forget($index)->values();
        $this->vitalSigns = $this->vitalSigns->sortBy('timestamp')->values();
    }
}
