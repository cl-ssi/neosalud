<?php

namespace App\Http\Livewire\Samu;

use App\Enums\MobileType as EnumsMobileType;
use Livewire\Component;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use App\Models\Commune;
use App\Models\Samu\MobileType;

class Stadistic extends Component
{
    public $keys;
    public $communes;

    public $key_id;
    public $return_key_id;
    public $commune_id;
    public $from;
    public $to;

    public $total = null;

    protected $rules = [
        'from' => 'required|date',
        'to'   => 'required|date'
    ];

    protected $messages = [
        'from.required' => 'La fecha desde es obligatoria.',
        'to.required'   => 'La fecha hasta es obligatoria.',
    ];

    public function mount()
    {
        $this->from      = now()->firstOfMonth()->format('Y-m-d');
        $this->to        = now()->lastOfMonth()->format('Y-m-d');
        $this->keys      = Key::orderBy('key')->get();
        $this->communes  = Commune::whereHas('samu')->orderBy('name')->pluck('name','id');
    }

    public function render()
    {
        return view('livewire.samu.stadistic');
    }

    public function search()
    {
        $this->validate();
        $this->getEventByCommune();
        $this->getEventByMobile();
    }

    public function getEventByCommune()
    {
        $chartData = array();
        $this->total = 0;

        foreach($this->communes as $id => $name)
        {
            $totalEvents = Event::query();

            if($this->key_id)
                $totalEvents->where('key_id', $this->key_id);

            if($this->return_key_id)
                $totalEvents->where('return_key_id', $this->key_id);

            $totalEvents->whereBetween('date', [$this->from, $this->to]);
            $this->total = $totalEvents->count();

            $totalEvents->where('commune_id', $id);

            if($totalEvents->count() > 0)
                $chartData[] = array($name, $totalEvents->count());
        }

        $totalEvents = Event::query();
        $totalEvents->whereNull('commune_id');
        $totalEvents->whereBetween('date', [$this->from, $this->to]);

        if($this->key_id)
            $totalEvents->where('key_id', $this->key_id);

        if($this->return_key_id)
            $totalEvents->where('return_key_id', $this->key_id);

        if($totalEvents->count() > 0)
            $chartData[] = array('Sin comuna', $totalEvents->count());

        array_unshift($chartData, ["Comuna", "Eventos"]);
        $this->emit('re-render', $chartData);
    }

    public function getEventByMobile()
    {
        $chartData = array();
        $mobilesType = MobileType::all();

        foreach($mobilesType as $mobileType)
        {
            $totalEvents = Event::query();

            if($this->key_id)
                $totalEvents->where('key_id', $this->key_id);

            if($this->return_key_id)
                $totalEvents->where('return_key_id', $this->key_id);

            $totalEvents->whereBetween('date', [$this->from, $this->to]);

            if($mobileType->id == EnumsMobileType::RU1->value || $mobileType->id == EnumsMobileType::RU2->value)
            {
                $totalEvents->whereHas('mobile', function ($query) use($mobileType) {
                    $query->whereHas('type', function($subquery) use($mobileType) {
                        $subquery->whereId($mobileType->id);
                    });
                });
            }
            else
            {
                $totalEvents->whereHas('mobileInService', function ($query) use($mobileType) {
                    $query->whereHas('type', function($query) use($mobileType) {
                        $query->whereId($mobileType->id);
                    });
                });
            }

            if($totalEvents->count() > 0)
                $chartData[] = array($mobileType->name, $totalEvents->count());
        }

        array_unshift($chartData, ["Mobiles", "Eventos"]);

        $this->emit('re-render-2', $chartData);
    }

    public function updatedKeyId()
    {
        $this->search();
    }

    public function updatedReturnKeyId()
    {
        $this->search();
    }

    public function updatedFrom()
    {
        $this->search();
    }

    public function updatedTo()
    {
        $this->search();
    }
}
