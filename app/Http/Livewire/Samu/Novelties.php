<?php

namespace App\Http\Livewire\Samu;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Samu\Noveltie;

class Novelties extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $date;
    
    public function render()
    {
        $novelties = Noveltie::with('shift','creator')
            ->search('detail',$this->search)
            ->search('created_at',$this->date)
            ->latest()
            ->paginate(25);
        return view('livewire.samu.novelties', [
            'novelties' => $novelties
            ]
        );
    }
}
