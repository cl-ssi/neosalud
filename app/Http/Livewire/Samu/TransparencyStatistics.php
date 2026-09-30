<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Call;
use App\Models\Samu\Event;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Samu\TransparencyStatisticsExport;

class TransparencyStatistics extends Component
{
    public $selectedYear;
    public $availableYears = [];
    public $annualStats = [];
    public $monthlyStats = [];
    public $loading = false;

    public $months = [
        1  => 'Enero',
        2  => 'Febrero',
        3  => 'Marzo',
        4  => 'Abril',
        5  => 'Mayo',
        6  => 'Junio',
        7  => 'Julio',
        8  => 'Agosto',
        9  => 'Septiembre',
        10 => 'Octubre',
        11 => 'Noviembre',
        12 => 'Diciembre'
    ];

    public function mount($year = null)
    {
        $this->availableYears = $this->getAvailableYears();
        $this->selectedYear = $year ?: (string) (end($this->availableYears) ?: now()->year);
        $this->loadStatistics();
    }

    public function render()
    {
        return view('livewire.samu.transparency-statistics');
    }

    public function updatedSelectedYear()
    {
        $this->monthlyStats = $this->getMonthlyStatisticsForYear((int) $this->selectedYear);
        $this->dispatchBrowserEvent('statistics-updated', [
            'annualStats'  => $this->annualStats,
            'monthlyStats' => $this->monthlyStats,
            'selectedYear' => $this->selectedYear,
        ]);
    }

    public function loadStatistics()
    {
        $this->loading = true;

        $this->annualStats  = $this->getAnnualStatistics();
        $this->monthlyStats = $this->getMonthlyStatisticsForYear((int) $this->selectedYear);

        $this->loading = false;

        $this->dispatchBrowserEvent('statistics-updated', [
            'annualStats'  => $this->annualStats,
            'monthlyStats' => $this->monthlyStats,
            'selectedYear' => $this->selectedYear,
        ]);
    }

    /**
     * Obtiene los años con registros en llamadas o eventos.
     */
    public function getAvailableYears(): array
    {
        $callYears = Call::selectRaw('YEAR(hour) as y')
            ->whereNotNull('hour')
            ->distinct()
            ->pluck('y');

        $eventYears = Event::selectRaw('YEAR(date) as y')
            ->whereNotNull('date')
            ->distinct()
            ->pluck('y');

        $years = $callYears->merge($eventYears)
            ->filter(fn($y) => !empty($y) && $y >= 2020 && $y <= now()->year + 1)
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        if (empty($years)) {
            $current = now()->year;
            $years = range($current - 4, $current);
        }

        return $years;
    }

    /**
     * Calcula los indicadores para cada año:
     * 1. Tiempo promedio de respuesta (min) por año
     * 2. Tiempo promedio de respuesta (P50 / Mediana) por año
     * 3. Tiempo promedio de respuesta (P90) por año
     * 4. Tiempo promedio anual entre recepción y despacho de recurso prehospitalario
     * 5. Tasa anual de abandono de llamadas: (Llamadas abandonadas / Total recibidas) × 100
     * 6. Porcentaje anual de llamadas que resultan en despacho:
     *    (Número de llamadas con despacho / Total de llamadas recibidas) × 100
     */
    public function getAnnualStatistics(): array
    {
        $results = [];

        foreach ($this->availableYears as $year) {
            // Indicadores 1, 2, 3: Tiempos de Respuesta (departure_at -> mobile_arrival_at)
            $responseTimes = $this->getResponseTimesForQuery(function ($query) use ($year) {
                $query->whereYear('date', $year);
            });

            $countTimes = $responseTimes->count();
            $avgTime    = $countTimes > 0 ? round($responseTimes->avg(), 2) : 0.0;
            $p50Time    = $this->calculatePercentile($responseTimes, 50);
            $p90Time    = $this->calculatePercentile($responseTimes, 90);

            // Indicador 4: Tiempo promedio entre recepción (hour) y despacho (departure_at)
            $recToDisp = $this->getAverageReceptionToDispatchForYear($year);

            // Indicadores 5 y 6: Llamadas recibidas, despachadas y abandonadas
            $totalCalls = Call::whereYear('hour', $year)->count();

            $dispatchedCalls = Call::whereYear('hour', $year)
                ->whereHas('events', function ($q) {
                    $q->whereNotNull('mobile_id');
                })
                ->count();

            // Llamadas abandonadas: Total recibidas - Llamadas con event y mobile
            $abandonedCalls = max(0, $totalCalls - $dispatchedCalls);

            // 5. Tasa de abandono
            $abandonmentRate = $totalCalls > 0
                ? round(($abandonedCalls / $totalCalls) * 100, 2)
                : 0.0;

            // 6. Porcentaje de despacho
            $dispatchPercentage = $totalCalls > 0
                ? round(($dispatchedCalls / $totalCalls) * 100, 2)
                : 0.0;

            $results[] = (object) [
                'year'                              => $year,
                'avg_response_time'                 => $avgTime,
                'p50_response_time'                 => $p50Time,
                'p90_response_time'                 => $p90Time,
                'avg_reception_to_dispatch_seconds' => $recToDisp['seconds'],
                'avg_reception_to_dispatch_minutes' => $recToDisp['minutes'],
                'total_calls'                       => $totalCalls,
                'dispatched_calls'                  => $dispatchedCalls,
                'abandoned_calls'                   => $abandonedCalls,
                'abandonment_rate'                  => $abandonmentRate,
                'dispatch_percentage'               => $dispatchPercentage,
                'times_sample_count'                => $countTimes,
            ];
        }

        return $results;
    }

    /**
     * Calcula los indicadores mes a mes para el año seleccionado.
     */
    public function getMonthlyStatisticsForYear(int $year): array
    {
        $results = [];

        // Pre-cargar llamadas del año agrupadas por mes
        $monthlyTotalCalls = Call::whereYear('hour', $year)
            ->selectRaw('MONTH(hour) as m, COUNT(*) as total')
            ->groupByRaw('MONTH(hour)')
            ->pluck('total', 'm');

        $monthlyDispatchedCalls = Call::whereYear('hour', $year)
            ->whereHas('events', function ($q) {
                $q->whereNotNull('mobile_id');
            })
            ->selectRaw('MONTH(hour) as m, COUNT(*) as total')
            ->groupByRaw('MONTH(hour)')
            ->pluck('total', 'm');

        // Indicador 4 por mes (recepción a despacho)
        $monthlyRecToDisp = $this->getMonthlyAverageReceptionToDispatch($year);

        for ($m = 1; $m <= 12; $m++) {
            $responseTimes = $this->getResponseTimesForQuery(function ($query) use ($year, $m) {
                $query->whereYear('date', $year)->whereMonth('date', $m);
            });

            $countTimes = $responseTimes->count();
            $avgTime    = $countTimes > 0 ? round($responseTimes->avg(), 2) : 0.0;
            $p50Time    = $this->calculatePercentile($responseTimes, 50);
            $p90Time    = $this->calculatePercentile($responseTimes, 90);

            $recToDisp = $monthlyRecToDisp[$m] ?? ['seconds' => 0.0, 'minutes' => 0.0];

            $totalCalls      = (int) ($monthlyTotalCalls[$m] ?? 0);
            $dispatchedCalls = (int) ($monthlyDispatchedCalls[$m] ?? 0);
            $abandonedCalls  = max(0, $totalCalls - $dispatchedCalls);

            $abandonmentRate = $totalCalls > 0
                ? round(($abandonedCalls / $totalCalls) * 100, 2)
                : 0.0;

            $dispatchPerc = $totalCalls > 0
                ? round(($dispatchedCalls / $totalCalls) * 100, 2)
                : 0.0;

            $results[] = (object) [
                'month'                             => $m,
                'month_name'                        => $this->months[$m],
                'avg_response_time'                 => $avgTime,
                'p50_response_time'                 => $p50Time,
                'p90_response_time'                 => $p90Time,
                'avg_reception_to_dispatch_seconds' => $recToDisp['seconds'],
                'avg_reception_to_dispatch_minutes' => $recToDisp['minutes'],
                'total_calls'                       => $totalCalls,
                'dispatched_calls'                  => $dispatchedCalls,
                'abandoned_calls'                   => $abandonedCalls,
                'abandonment_rate'                  => $abandonmentRate,
                'dispatch_percentage'               => $dispatchPerc,
                'times_sample_count'                => $countTimes,
            ];
        }

        return $results;
    }

    /**
     * Indicador 4: Tiempo promedio anual entre recepción de la llamada y despacho del recurso.
     */
    private function getAverageReceptionToDispatchForYear(int $year): array
    {
        $avgSec = (float) DB::table('samu_calls as c')
            ->join('samu_events as e', 'c.id', '=', 'e.call_id')
            ->whereYear('c.hour', $year)
            ->whereNotNull('c.hour')
            ->whereNotNull('e.departure_at')
            ->whereRaw('e.departure_at >= c.hour')
            ->whereRaw('TIMESTAMPDIFF(SECOND, c.hour, e.departure_at) <= 86400')
            ->avg(DB::raw('TIMESTAMPDIFF(SECOND, c.hour, e.departure_at)'));

        return [
            'seconds' => round($avgSec, 2),
            'minutes' => round($avgSec / 60, 2),
        ];
    }

    /**
     * Indicador 4 Mensual: Tiempo promedio entre recepción y despacho para cada mes.
     */
    private function getMonthlyAverageReceptionToDispatch(int $year): array
    {
        $results = DB::table('samu_calls as c')
            ->join('samu_events as e', 'c.id', '=', 'e.call_id')
            ->whereYear('c.hour', $year)
            ->whereNotNull('c.hour')
            ->whereNotNull('e.departure_at')
            ->whereRaw('e.departure_at >= c.hour')
            ->whereRaw('TIMESTAMPDIFF(SECOND, c.hour, e.departure_at) <= 86400')
            ->selectRaw('MONTH(c.hour) as m, AVG(TIMESTAMPDIFF(SECOND, c.hour, e.departure_at)) as avg_sec')
            ->groupByRaw('MONTH(c.hour)')
            ->pluck('avg_sec', 'm');

        $data = [];
        for ($m = 1; $m <= 12; $m++) {
            $sec = isset($results[$m]) ? (float) $results[$m] : 0.0;
            $data[$m] = [
                'seconds' => round($sec, 2),
                'minutes' => round($sec / 60, 2),
            ];
        }

        return $data;
    }

    /**
     * Obtiene una colección ordenada de tiempos de respuesta en minutos
     * aplicando el callback de filtrado sobre Event.
     */
    private function getResponseTimesForQuery(callable $filterCallback)
    {
        $query = Event::query()
            ->whereNotNull('departure_at')
            ->whereNotNull('mobile_arrival_at')
            ->whereRaw('mobile_arrival_at >= departure_at');

        $filterCallback($query);

        return $query->selectRaw('TIMESTAMPDIFF(SECOND, departure_at, mobile_arrival_at) / 60 as minutes')
            ->pluck('minutes')
            ->map(fn($v) => (float) $v)
            ->filter(fn($v) => $v >= 0 && $v <= 1440)
            ->sort()
            ->values();
    }

    /**
     * Calcula el percentil usando interpolación lineal estándar (P50, P90, etc.)
     */
    private function calculatePercentile($sortedCollection, int $percentile): float
    {
        $count = $sortedCollection->count();
        if ($count === 0) {
            return 0.0;
        }
        if ($count === 1) {
            return round((float) $sortedCollection->first(), 2);
        }

        $index  = ($percentile / 100) * ($count - 1);
        $lower  = (int) floor($index);
        $upper  = (int) ceil($index);
        $weight = $index - $lower;

        $valLower = (float) $sortedCollection->get($lower);
        $valUpper = (float) $sortedCollection->get($upper);

        return round($valLower * (1 - $weight) + $valUpper * $weight, 2);
    }

    /**
     * Exportación de las estadísticas de transparencia a Excel
     */
    public function exportTransparencyExcel()
    {
        return Excel::download(
            new TransparencyStatisticsExport($this->annualStats, $this->monthlyStats, $this->selectedYear),
            "estadisticas_transparencia_{$this->selectedYear}.xlsx"
        );
    }
}
