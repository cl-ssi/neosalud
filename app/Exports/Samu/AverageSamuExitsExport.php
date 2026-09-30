<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\TransparencyStatistics;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AverageSamuExitsExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
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
            $this->data = $component->getAverageSamuExitsMonthly();
        }
    }

    public function headings(): array
    {
        return ['Mes', 'Total Salidas', 'Días del Mes', 'Promedio Diario'];
    }

    public function array(): array
    {
        $rows = [];
        foreach ($this->data as $item) {
            $rows[] = [
                $item->month_name ?? '',
                $item->total ?? 0,
                $item->days_in_month ?? 0,
                $item->average_daily ?? 0,
            ];
        }
        return $rows;
    }

    public function title(): string
    {
        return 'Promedio Salidas SAMU ' . $this->year;
    }
}
