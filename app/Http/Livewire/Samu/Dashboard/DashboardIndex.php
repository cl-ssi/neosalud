<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByCommune;
use App\Charts\Samu\EventByMobile;
use App\Charts\Samu\EventByMonth;
use App\Charts\Samu\EventBySex;
use App\Charts\Samu\EventLastMonth;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $event_last_month;
    public $event_by_commune;
    public $event_by_mobile;
    public $event_by_month;
    public $event_by_gender;

    public function mount()
    {
        $this->event_last_month = (new EventLastMonth())->getDataset();
        $this->event_by_commune = (new EventByCommune())->getDataset();
        $this->event_by_mobile = (new EventByMobile())->getDataset();
        $this->event_by_month = (new EventByMonth())->getDataset();
        $this->event_by_gender = (new EventBySex())->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.dashboard-index');
    }
}
