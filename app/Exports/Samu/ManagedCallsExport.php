<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\MinsalStatistics;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class ManagedCallsExport implements FromView, WithTitle
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
        $data = $component->getTotalManagedCallsMonthly();

        return view('samu.minsal.managed-calls', [
            'data' => $data,
            'year' => $this->year
        ]);
    }

    public function title(): string
    {
        return 'Llamadas Gestionadas ' . $this->year;
    }
}
