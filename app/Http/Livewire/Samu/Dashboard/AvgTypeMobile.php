<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\AvgTypeMobile as SamuAvgTypeMobile;
use Livewire\Component;

class AvgTypeMobile extends Component
{
    public $rows;
    public $mobilesType;

    public function mount()
    {
        $samuAvgTypeMobile = new SamuAvgTypeMobile();
        $this->mobilesType = $samuAvgTypeMobile->getMobilesType();
        $this->rows = $samuAvgTypeMobile->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.avg-type-mobile');
    }
}
