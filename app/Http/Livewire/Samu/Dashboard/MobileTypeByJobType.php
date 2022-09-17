<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\MobileTypeByJobType as SamuMobileTypeByJobType;
use App\Helpers\Date;
use Livewire\Component;

class MobileTypeByJobType extends Component
{
    public $week;
    public $results;

    public function mount()
    {
        $this->week = Date::getWeek();
        $this->results = (new SamuMobileTypeByJobType())->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.mobile-type-by-job-type');
    }
}
