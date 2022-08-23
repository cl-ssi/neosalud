<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventMobileType;
use Livewire\Component;

class EventByMobileType extends Component
{
    public $rows;

    public function mount()
    {
        $this->rows = (new EventMobileType())->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-mobile-type');
    }
}
