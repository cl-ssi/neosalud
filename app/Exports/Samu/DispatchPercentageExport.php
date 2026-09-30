<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\TransparencyStatistics;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DispatchPercentageExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
{
    protected $year;
    protected $data;

    public function __construct($year, $data = null)
    {
        $this->year = $year;
        if ($data !== null) {
            $this->data = $data;
        } else {
            $component = new TransparencyStatistics();
            $component->year = $this->year;
            $this->data = $component->getDispatchPercentageMonthly();
        }
    }

    public function headings(): array
    {
        return ['Mes', 'Llamadas Gestionadas', 'Llamadas Despachadas', 'Porcentaje (%)'];
    }

    public function array(): array
    {
        $rows = [];
        foreach ($this->data as $item) {
            $rows[] = [
                $item->month_name ?? '',
                $item->managed ?? 0,
                $item->dispatched ?? 0,
                ($item->percentage ?? 0) . '%',
            ];
        }
        return $rows;
    }

    public function title(): string
    {
        return 'Porcentaje Despacho ' . $this->year;
    }
}
