<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\AverageAmbulanceRetention as SamuAverageAmbulanceRetention;
use Livewire\Component;

class AverageAmbulanceRetention extends Component
{
    public $weeks;

    public function mount()
    {
        $this->weeks = (new SamuAverageAmbulanceRetention())->getDataset();
    }

    public function render()
    {
        return view('livewire.samu.dashboard.average-ambulance-retention');
    }
}
