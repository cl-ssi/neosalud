<?php

namespace App\Exports\Samu;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TransparencyStatisticsExport implements FromArray, WithHeadings, WithTitle, ShouldAutoSize
{
    protected $annualStats;
    protected $monthlyStats;
    protected $selectedYear;

    public function __construct(array $annualStats = [], array $monthlyStats = [], $selectedYear = null)
    {
        $this->annualStats  = $annualStats;
        $this->monthlyStats = $monthlyStats;
        $this->selectedYear = $selectedYear ?: now()->year;
    }

    public function headings(): array
    {
        return [
            'Año / Periodo',
            '1. Tiempo Promedio Respuesta (min)',
            '2. Tiempo Respuesta P50 (min)',
            '3. Tiempo Respuesta P90 (min)',
            '4. Tiempo Recepción a Despacho (seg)',
            '4. Tiempo Recepción a Despacho (min)',
            'Total Llamadas Recibidas',
            'Llamadas con Despacho',
            'Llamadas Abandonadas',
            '5. Tasa de Abandono (%)',
            '6. % Despacho Prehospitalario (%)',
        ];
    }

    public function array(): array
    {
        $rows = [];

        // Filas anuales
        foreach ($this->annualStats as $item) {
            $rows[] = [
                'Año ' . $item->year,
                $item->avg_response_time,
                $item->p50_response_time,
                $item->p90_response_time,
                $item->avg_reception_to_dispatch_seconds,
                $item->avg_reception_to_dispatch_minutes,
                $item->total_calls,
                $item->dispatched_calls,
                $item->abandoned_calls,
                $item->abandonment_rate . '%',
                $item->dispatch_percentage . '%',
            ];
        }

        if (!empty($this->monthlyStats)) {
            $rows[] = ['', '', '', '', '', '', '', '', '', '', '']; // Espaciador
            $rows[] = ['DESGLOSE MENSUAL AÑO ' . $this->selectedYear, '', '', '', '', '', '', '', '', '', ''];

            foreach ($this->monthlyStats as $item) {
                $rows[] = [
                    $item->month_name,
                    $item->avg_response_time,
                    $item->p50_response_time,
                    $item->p90_response_time,
                    $item->avg_reception_to_dispatch_seconds,
                    $item->avg_reception_to_dispatch_minutes,
                    $item->total_calls,
                    $item->dispatched_calls,
                    $item->abandoned_calls,
                    $item->abandonment_rate . '%',
                    $item->dispatch_percentage . '%',
                ];
            }
        }

        return $rows;
    }

    public function title(): string
    {
        return 'Transparencia SAMU ' . $this->selectedYear;
    }
}
