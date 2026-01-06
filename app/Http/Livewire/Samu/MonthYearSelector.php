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
        $this->getMonthYearOptions();
        $this->selectedMonthYear = array_key_last($this->options);
    }

    public function getMonthYearOptions()
    {
        $options = [];
        $currentDate = Carbon::now();
        $startDate = Carbon::create($currentDate->year - 1, 7, 1); // Julio año pasado

        while ($startDate->lte($currentDate)) {
            $monthYear = $startDate->format('m-Y');
            $options[$monthYear] = $this->months[$startDate->format('m')] . ' ' . $startDate->year;
            $startDate->addMonth();
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
