<?php

namespace App\Http\Livewire\Samu\Dashboard;

use App\Charts\Samu\CallsByClassification as SamuCallsByClassification;
use Livewire\Component;

class CallsByClassification extends Component
{
    public $year;
    public $month;
    public $year_month;
    public $chartData;

    public function mount()
    {
        $this->year = $this->year ? $this->year : now()->year;
        $this->month = $this->month ? $this->month : now()->month;
        $this->year_month = $this->year . "-" . $this->month;
    }

    public function render()
    {
        return view('livewire.samu.dashboard.calls-by-classification');
    }

    public function getData()
    {
        $SamuCallsByClassification = new SamuCallsByClassification($this->year, $this->month);
        $chartData = ($SamuCallsByClassification->getDataset());
        $this->emit('calls-by-classification', $chartData);
    }

    public function updatedYearMonth($yearMonth)
    {
        $yearMonth = explode("-", $yearMonth);
        $this->year = $yearMonth[0];
        $this->month = $yearMonth[1];
        $this->getData();
    }
}
