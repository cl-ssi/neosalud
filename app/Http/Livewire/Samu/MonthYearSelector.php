<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use Carbon\Carbon;

class MonthYearSelector extends Component
{
    public $selectedMonthYear;

    protected $months = [
        '01' => 'Enero',
        '02' => 'Febrero',
        '03' => 'Marzo',
        '04' => 'Abril',
        '05' => 'Mayo',
        '06' => 'Junio',
        '07' => 'Julio',
        '08' => 'Agosto',
        '09' => 'Septiembre',
        '10' => 'Octubre',
        '11' => 'Noviembre',
        '12' => 'Diciembre',
    ];

    protected $year;

    protected $month;

    public $options;

    public function mount()
    {

        $this->selectedMonthYear = $this->month . '-' . $this->year;
        $this->getMonthYearOptions();
    }

    public function getMonthYearOptions()
    {
        $options = [];
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        for ($month = $currentMonth; $month >= 1; $month--) {
            $monthYear = sprintf('%02d-%d', $month, $currentYear);
            $options[$monthYear] = $this->months[sprintf('%02d', $month)] . ' ' . $currentYear;
        }
        $this->options = $options;
    }

    public function updatedSelectedMonthYear($value)
    {
        $data = explode('-', $value);
        $this->emitUp('updateDate', $data[0], $data[1]);
    }

    public function render()
    {
        return view('livewire.samu.month-year-selector');
    }
}
