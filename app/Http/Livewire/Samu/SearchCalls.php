<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
//use Livewire\WithPagination;
use App\Models\Commune;
use App\Models\Samu\Call;
use Carbon\Carbon;

class SearchCalls extends Component
{
    //use WithPagination;

    public $calls;
    public $useRange = false;

    public $date = [
        'from'   => null,
        'to'     => null,
        'single' => null,
    ];
    public $address;
    public $commune_id;
    public $communes;

    public function mount()
    {
        /* TODO: Parametrizar */
        $this->communes = Commune::whereHas('samu')
            ->pluck('id', 'name')
            ->sort();
    }

    public function search()
    {
        $query = Call::query();

        $query->when($this->date, function ($query) {
            if ($this->useRange) {
                $query->whereBetween('hour', [Carbon::parse($this->date['from'])->startOfDay(), Carbon::parse($this->date['to'])->endOfDay()]);
            } else {
                $query->whereBetween('hour', [Carbon::parse($this->date['single'])->startOfDay(), Carbon::parse($this->date['single'])->endOfDay()]);
            }
        });

        $query->when($this->address, function ($query) {
            $query->where('address', 'LIKE', '%' . $this->address . '%');
        });
        $query->when($this->commune_id, function ($query) {
            $query->where('commune_id', '=', $this->commune_id);
        });

        $this->calls = $query->withTrashed()
            ->latest()
            ->get();
        // $this->calls->paginate(10);
    }

    public function render()
    {
        return view('livewire.samu.search-calls');
    }
}
