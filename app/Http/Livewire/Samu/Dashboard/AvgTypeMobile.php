<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\AvgTypeMobile as SamuAvgTypeMobile;
use Livewire\Component;

class AvgTypeMobile extends Component
{
    public $rows;

    public function mount()
    {
        $this->rows = ((new SamuAvgTypeMobile())->getDataset());
    }

    public function render()
    {
        return view('livewire.samu.dashboard.avg-type-mobile');
    }
}
