<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\EventMobileTypeMonthly as ChartsEventByMobileTypeMonthly;
use Livewire\Component;

use Illuminate\Support\Carbon;

class EventByMobileTypeMonthly extends Component
{
    public $year;
    public $month;
    public $year_month;

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
            '# de Eventos del ' . $date->monthName . ' de ' . $this->year,
            ["role" => 'style' ],
            ["role" => 'annotation' ],
        ];

        $chartData = (new ChartsEventByMobileTypeMonthly($this->year, $this->month))->getDataset();

        array_unshift($chartData, $options);
        $this->emit('event-by-mobile-type-monthly', $chartData);
    }

    public function render()
    {
        return view('livewire.samu.dashboard.event-by-mobile-type-monthly');
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getData();
    }
}
