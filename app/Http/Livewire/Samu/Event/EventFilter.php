<?php

namespace App\Http\Livewire\Samu\Event;

use App\Models\Commune;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use Livewire\Component;
use Livewire\WithPagination;

class EventFilter extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $keys;
    public $communes;

    public $date;
    public $key_id;
    public $address;
    public $commune_id;
    public $filter_by;


    public function mount()
    {
        $this->filter_by = "all";
        $this->keys = Key::orderBy('key')->get();
        $this->communes = Commune::whereHas('samu')->pluck('id','name')->sort();
    }

    public function render()
    {
        return view('livewire.samu.event.event-filter', [
            'events' => $this->getEvents()
        ])->extends('layouts.app');
    }

    public function getEvents()
    {
        $query =  Event::query();

        $query->when($this->date, function($query) {
            $query->whereDate('date', $this->date);
        });

        $query->when($this->key_id, function($query) {
            $query->where('key_id', $this->key_id);
        });

        $query->when($this->address, function($query) {
            $query->where('address', 'LIKE', '%' . $this->address . '%');
        });

        $query->when($this->commune_id, function($query) {
            $query->where('commune_id', $this->commune_id);
        });

        $query->when($this->filter_by == 'valid', function($query) {
            $query->onlyValid();
        });

        return $query->paginate(100);
    }
}
