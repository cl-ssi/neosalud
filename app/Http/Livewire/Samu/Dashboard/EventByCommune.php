<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByCommune as ChartsEventByCommune;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EventByCommune extends Component
{
    public $month;
    public $year;
    public $year_month;

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-commune');
    }

    public function mount()
    {
        $this->year = $this->year ? $this->year : now()->year;
        $this->month = $this->month ? $this->month : now()->month;
        $this->year_month = $this->year . "-" . $this->month;
    }

    public function getData()
    {
        $date = Carbon::create()->day(1)->month($this->month);

        $options = [
            'Comuna',
            '# de Eventos del mes ' . $date->monthName . ' del año ' . $this->year,
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ];

        $chartData = (new ChartsEventByCommune($this->year, $this->month))->getDataset();
        array_unshift($chartData, $options);
        $this->emit('event-by-commune', $chartData);
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getData();
    }
}
