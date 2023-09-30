<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\AvgMobileArrival as SamuAvgMobileArrival;
use Livewire\Component;

class AvgMobileArrival extends Component
{
    public $chartData;

    public function render()
    {
        return view('livewire.samu.dashboard.avg-mobile-arrival');
    }

    public function getData()
    {
        $options = [
            'Mes',
            'Promedio en minutos al mes',
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ];

        $chartData = (new SamuAvgMobileArrival())->getDataset();

        array_unshift($chartData, $options);

        $this->emit('avg-mobile-arrival', $chartData);
    }
}
