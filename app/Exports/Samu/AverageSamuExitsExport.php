<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\MinsalStatistics;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class AverageSamuExitsExport implements FromView, WithTitle
{
    protected $year;

    public function __construct($year)
    {
        $this->year = $year;
    }

    public function view(): View
    {
        $component = new MinsalStatistics();
        $component->year = $this->year;
        $data = $component->getAverageSamuExitsMonthly();

        return view('samu.minsal.average-samu-exits', [
            'data' => $data,
            'year' => $this->year
        ]);
    }

    public function title(): string
    {
        return 'Promedio Salidas SAMU ' . $this->year;
    }
}
