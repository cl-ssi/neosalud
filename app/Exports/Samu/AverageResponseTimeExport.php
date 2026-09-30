<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\TransparencyStatistics;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AverageResponseTimeExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
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
            $this->data = $component->getAverageResponseTimeMonthly();
        }
    }

    public function headings(): array
    {
        return ['Tipo de Emergencia', 'Mes', 'Tiempo Promedio (min)'];
    }

    public function array(): array
    {
        $rows = [];
        foreach ($this->data as $emergencyType => $monthlyData) {
            foreach ($monthlyData as $item) {
                $rows[] = [
                    $emergencyType,
                    $item->month_name ?? '',
                    $item->avg_response_time ?? 0,
                ];
            }
        }
        return $rows;
    }

    public function title(): string
    {
        return 'Tiempo Respuesta Emergencias ' . $this->year;
    }
}
