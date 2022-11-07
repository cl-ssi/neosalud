<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventByPrevision as ChartsEventByPrevision;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EventByPrevision extends Component
{
    public $year;
    public $month;
    public $year_month;

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-prevision');
    }

    public function mount()
    {
        $this->year = $this->year ? $this->year : now()->year;
        $this->month = $this->month ? $this->month : now()->month;
        $this->year_month = $this->year . "-" . $this->month;
    }

    public function getData()
    {
        $date = Carbon::parse($this->year . "-" . $this->month . "-01");

        $options = [
            'Prevision',
            '# de Eventos del mes ' . $date->monthName . ' del año ' . $this->year
        ];

        $chartData = (new ChartsEventByPrevision($this->year, $this->month))->getDataset();
        array_unshift($chartData, $options);
        $this->emit('event-by-prevision', $chartData);
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getData();
    }
}
