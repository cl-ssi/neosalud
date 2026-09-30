<?php

namespace App\Exports\Samu;

use App\Http\Livewire\Samu\TransparencyStatistics;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UniquePatientsByClassificationExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
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
            $this->data = $component->getUniquePatientsAttendedByClassification();
        }
    }

    public function headings(): array
    {
        return [
            'Clasificación',
            'Enero',
            'Febrero',
            'Marzo',
            'Abril',
            'Mayo',
            'Junio',
            'Julio',
            'Agosto',
            'Septiembre',
            'Octubre',
            'Noviembre',
            'Diciembre',
        ];
    }

    public function array(): array
    {
        $months = [
            'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
        ];

        $rows = [];
        foreach ($this->data as $classification => $monthlyCounts) {
            $row = [$classification];
            foreach ($months as $month) {
                $row[] = $monthlyCounts[$month] ?? 0;
            }
            $rows[] = $row;
        }
        return $rows;
    }

    public function title(): string
    {
        return 'Pacientes por Clasificación ' . $this->year;
    }
}
