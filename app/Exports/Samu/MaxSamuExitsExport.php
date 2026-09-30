<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\TransparencyStatistics;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class MaxSamuExitsExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
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
            $this->data = $component->getMaxSamuExitsMonthly();
        }
    }

    public function headings(): array
    {
        return ['Mes', 'Promedio', 'Mediana', 'Máximo'];
    }

    public function array(): array
    {
        $rows = [];
        foreach ($this->data as $item) {
            $rows[] = [
                $item->month_name ?? '',
                $item->promedio ?? 0,
                $item->mediana ?? 0,
                $item->maximo ?? 0,
            ];
        }
        return $rows;
    }

    public function title(): string
    {
        return 'Máximos Salidas SAMU ' . $this->year;
    }
}
