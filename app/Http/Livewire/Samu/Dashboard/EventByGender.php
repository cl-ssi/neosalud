<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventBySex as ChartsEventBySex;
use Livewire\Component;

class EventByGender extends Component
{
    public $dataset;
    public $year;
    public $month;
    public $year_month;

    public function mount()
    {
        $this->year = $this->year ? $this->year : now()->year;
        $this->month = $this->month ? $this->month : now()->month;
        $this->year_month = $this->year . "-" . $this->month;
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-gender');
    }

    public function getData()
    {
        $options = [
            'Género',
            '# de Eventos por sexo',
            ["role" => 'style' ]
        ];

        $chartData = (new ChartsEventBySex($this->year, $this->month))->getDataset();
        array_unshift($chartData, $options);
        $this->emit('event-by-gender', $chartData);
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getData();
    }
}
