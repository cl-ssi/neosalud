<?php

namespace App\Http\Livewire\Samu\VitalSign;

use App\Http\Requests\VitalSign\VitalSignRequest;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $event;

    public $edit;
    public $mode;
    public $type_input;
    public $id_vital_sign;

    public $registered_at;
    public $fc;
    public $fr;
    public $pa;
    public $pam;
    public $gl;
    public $soam;
    public $soap;
    public $hgt;
    public $fill_capillary;
    public $t;
    public $p;
    public $lcf;

    public $listeners = [
        'loadVitalSign'
    ];

    public function render()
    {
        return view('livewire.samu.vital-sign.form');
    }

    public function mount()
    {
        $this->type_input = $this->getTypeInput();
        $this->mode = 'create';
    }

    public function addVitalSign()
    {
        $vitalSign = $this->validate((new VitalSignRequest())->rules());
        $vitalSign['type_input'] = $this->type_input;
        $vitalSign['registered_at_format'] = ($this->getRegisteredAtFormat($vitalSign['registered_at']))->format('Y-m-d H:i');
        $vitalSign['timestamp'] = ($this->getRegisteredAtFormat($vitalSign['registered_at']))->timestamp;
        $vitalSign['id'] = null;
        $this->emitTo('samu.vital-sign.lists', 'addLists', $vitalSign);
        $this->resetInputs();
    }

    public function loadVitalSign($vitalSign, $index)
    {
        $this->mode = 'edit';
        $this->index = $index;
        $this->type_input = $vitalSign['type_input'] ? $vitalSign['type_input'] : null;
        $this->id_vital_sign = $vitalSign['id'];

        $this->registered_at = $vitalSign['registered_at'];
        $this->fc = $vitalSign['fc'];
        $this->fr = $vitalSign['fr'];
        $this->pa = $vitalSign['pa'];
        $this->pam = $vitalSign['pam'];
        $this->gl = $vitalSign['gl'];
        $this->soam = $vitalSign['soam'];
        $this->soap = $vitalSign['soap'];
        $this->hgt = $vitalSign['hgt'];
        $this->fill_capillary = $vitalSign['fill_capillary'];
        $this->t = $vitalSign['t'];
        $this->p = $vitalSign['p'];
        $this->lcf = $vitalSign['lcf'];
    }

    public function updateVitalSign()
    {
        $vitalSign = $this->validate((new VitalSignRequest())->rules());
        $vitalSign['id'] = $this->id_vital_sign;
        $vitalSign['type_input'] = $this->type_input;
        $vitalSign['registered_at'] = $this->registered_at;
        $vitalSign['registered_at_format'] = ($this->getRegisteredAtFormat($vitalSign['registered_at']))->format('Y-m-d H:i');
        $vitalSign['timestamp'] = ($this->getRegisteredAtFormat($vitalSign['registered_at']))->timestamp;

        $this->emitTo('samu.vital-sign.lists', 'updateVitalSign', $vitalSign, $this->index);
        $this->resetInputs();
        $this->index = null;
        $this->mode = 'create';
    }

    public function getRegisteredAtFormat($registered_at)
    {
        $date = Carbon::parse($registered_at);
        $date->setTimezone(config('app.timezone'));
        return $date;
    }

    public function cancel()
    {
        $this->mode = 'create';
        $this->index = null;
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->reset([
            'registered_at',
            'fc',
            'fr',
            'pa',
            'pam',
            'gl',
            'soam',
            'soap',
            'hgt',
            'fill_capillary',
            't',
            'p',
            'lcf',
        ]);
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
}
