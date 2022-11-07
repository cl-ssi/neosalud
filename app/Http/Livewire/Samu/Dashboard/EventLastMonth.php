<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventLastMonth as ChartsEventLastMonth;
use Livewire\Component;

class EventLastMonth extends Component
{
    public function render()
    {
        return view('livewire.samu.dashboard.event-last-month');
    }

    public function getData()
    {
        $options = [
            'fecha',
            'eventos',
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ];

        $chartData = (new ChartsEventLastMonth())->getDataset();
        array_unshift($chartData, $options);
        $this->emit('event-last-month', $chartData);
    }
}
