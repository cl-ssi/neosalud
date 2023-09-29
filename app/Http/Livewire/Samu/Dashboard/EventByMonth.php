<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByMonth as ChartsEventByMonth;
use Livewire\Component;

class EventByMonth extends Component
{
    public $year;
    public $month;
    
    public function mount()
    {
        $this->year = now()->year;
        $this->month = now()->month;
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-month');
    }

    public function getData()
    {
        $options = [
            'Mes',
            '# de Eventos del mes',
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ];

        $chartData = (new ChartsEventByMonth($this->year, $this->month))->getDataset();
        array_unshift($chartData, $options);
        $this->emit('event-by-month', $chartData);
    }
}
