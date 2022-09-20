<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\MobileTypeByJobType as SamuMobileTypeByJobType;
use App\Helpers\Date;
use Livewire\Component;

class MobileTypeByJobType extends Component
{
    public $week;
    public $rows;
    public $mobilesType;

    public function mount()
    {
        $samuMobileTypeByJobType = new SamuMobileTypeByJobType();
        $this->week = $samuMobileTypeByJobType->getWeek();
        $this->mobilesType = $samuMobileTypeByJobType->getMobilesType();
        $this->rows = $samuMobileTypeByJobType->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.mobile-type-by-job-type');
    }
}
