<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use App\Models\Samu\Call;
use App\Models\Samu\Event;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Samu\MaxSamuExitsExport;
use App\Exports\Samu\AverageSamuExitsExport;
use App\Exports\Samu\AverageResponseTimeExport;
use App\Exports\Samu\ManagedCallsExport;
use App\Exports\Samu\DispatchedCallsExport;
use App\Exports\Samu\DispatchPercentageExport;
use App\Exports\Samu\UniquePatientsExport;
use App\Exports\Samu\UniquePatientsByClassificationExport;

class MinsalStatistics extends Component
{
    public $year;
    public $statistics = [];
    public $loading = false;

    protected $listeners = ['yearChanged' => 'loadStatistics'];

    public function mount()
    {
        $this->year = now()->year;
        $this->loadStatistics();
    }

    public function render()
    {
        return view('livewire.samu.minsal-statistics');
    }

    public function updatedYear()
    {
        $this->loadStatistics();
    }

    public function loadStatistics()
    {
        $this->loading = true;

        $this->statistics = [
            'max_samu_exits' => $this->getMaxSamuExitsMonthly(),
            'average_samu_exits' => $this->getAverageSamuExitsMonthly(),
            'average_response_time' => $this->getAverageResponseTimeMonthly(),
            'managed_calls' => $this->getTotalManagedCallsMonthly(),
            'dispatched_calls' => $this->getTotalDispatchedCallsMonthly(),
            'dispatch_percentage' => $this->getDispatchPercentageMonthly(),
            'unique_patients' => $this->getUniquePatientsAttended(),
            'unique_patients_by_classification' => $this->getUniquePatientsAttendedByClassification(),
        ];

        $this->loading = false;
    }

    /**
     * Máximos de salidas por mes solo SAMU (classification: T1, T2).
     */
    public function getMaxSamuExitsMonthly()
    {
        return Call::whereYear('hour', $this->year)
            ->whereIn('classification', ['T1', 'T2'])
            ->select(DB::raw('MONTH(hour) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(hour)'))
            ->orderBy(DB::raw('MONTH(hour)'))
            ->get()
            ->map(function ($item) {
                $item->month_name = $this->getMonthName($item->month);
                return $item;
            });
    }

    /**
     * Promedio de salidas por mes solo SAMU (classification: T1, T2), calculando el promedio diario de salidas en cada mes.
     */
    public function getAverageSamuExitsMonthly()
    {
        $results = Call::whereYear('hour', $this->year)
            ->whereIn('classification', ['T1', 'T2'])
            ->select(DB::raw('MONTH(hour) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(hour)'))
            ->orderBy(DB::raw('MONTH(hour)'))
            ->get();

        return $results->map(function ($item) {
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $item->month, $this->year);
            $item->days_in_month = $daysInMonth;
            $item->average_daily = round($item->total / $daysInMonth, 2);
            $item->month_name = $this->getMonthName($item->month);
            return $item;
        });
    }
    /**
     * Promedio de tiempo de respuesta a emergencias (promedio mensual, dos decimales) para códigos específicos.
     */
    public function getAverageResponseTimeMonthly()
    {
        $key_ids = [
            'PCR' => [2, 13],
            'SCA' => [16],
            'ACV' => [116],
            'IRA' => [120],
            'Politraumatismo' => [127]
        ];

        $data = [];

        foreach ($key_ids as $name => $ids) {
            $results = Event::whereYear('date', $this->year)
                ->whereIn('key_id', $ids)
                ->whereNotNull('departure_at')
                ->whereNotNull('mobile_arrival_at')
                ->select(DB::raw('MONTH(date) as month, AVG(TIMESTAMPDIFF(SECOND, departure_at, mobile_arrival_at)) as avg_response_time'))
                ->groupBy(DB::raw('MONTH(date)'))
                ->orderBy(DB::raw('MONTH(date)'))
                ->get();

            $data[$name] = $results->map(function ($item) {
                $item->avg_response_time = round($item->avg_response_time / 60, 2); // Convertir a minutos
                $item->month_name = $this->getMonthName($item->month);
                return $item;
            });
        }

        return $data;
    }

    /**
     * Total de llamadas (classification: T1, T2) por mes.
     */
    public function getTotalManagedCallsMonthly()
    {
        return Call::whereYear('hour', $this->year)
            ->whereIn('classification', ['T1', 'T2'])
            ->select(DB::raw('MONTH(hour) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(hour)'))
            ->orderBy(DB::raw('MONTH(hour)'))
            ->get()
            ->map(function ($item) {
                $item->month_name = $this->getMonthName($item->month);
                return $item;
            });
    }

    /**
     * Total de llamadas (classification: T1, T2) por mes con cometido.
     */
    public function getTotalDispatchedCallsMonthly()
    {
        return Call::whereYear('hour', $this->year)
            ->whereIn('classification', ['T1', 'T2'])
            ->whereHas('events', function ($query) {
                $query->whereNotNull('mobile_id'); // Asumiendo que mobile_id indica cometido
            })
            ->select(DB::raw('MONTH(hour) as month, COUNT(*) as total'))
            ->groupBy(DB::raw('MONTH(hour)'))
            ->orderBy(DB::raw('MONTH(hour)'))
            ->get()
            ->map(function ($item) {
                $item->month_name = $this->getMonthName($item->month);
                return $item;
            });
    }

    /**
     * Porcentaje de despacho de móviles: Relación porcentual entre llamadas gestionadas y despachadas (dos decimales).
     */
    public function getDispatchPercentageMonthly()
    {
        $managedCalls = $this->getTotalManagedCallsMonthly()->keyBy('month');
        $dispatchedCalls = $this->getTotalDispatchedCallsMonthly()->keyBy('month');

        $data = collect();

        for ($i = 1; $i <= 12; $i++) {
            $managed = $managedCalls->get($i)->total ?? 0;
            $dispatched = $dispatchedCalls->get($i)->total ?? 0;
            $percentage = ($managed > 0) ? round(($dispatched / $managed) * 100, 2) : 0;

            $data->push((object)[
                'month' => $i,
                'month_name' => $this->getMonthName($i),
                'managed' => $managed,
                'dispatched' => $dispatched,
                'percentage' => $percentage
            ]);
        }

        return $data;
    }

    /**
     * Número de pacientes atendidos: Pacientes únicos en cometidos, identificados por el campo patient_identification en Event.
     */
    public function getUniquePatientsAttended()
    {
        return Event::whereYear('date', $this->year)
            ->whereNotNull('patient_identification')
            ->distinct('patient_identification')
            ->count('patient_identification');
    }

    /**
     * Número de pacientes atendidos por tipo: Pacientes únicos en cometidos por classification (T1, T2, M1, M2), usando patient_identification.
     */
    public function getUniquePatientsAttendedByClassification()
    {
        $classifications = ['T1', 'T2', 'M1', 'M2'];
        $data = [];

        foreach ($classifications as $classification) {
            $count = Event::whereYear('date', $this->year)
                ->whereNotNull('patient_identification')
                ->whereHas('call', function ($query) use ($classification) {
                    $query->where('classification', $classification);
                })
                ->distinct('patient_identification')
                ->count('patient_identification');
            $data[$classification] = $count;
        }

        return $data;
    }

    private function getMonthName($month)
    {
        $months = [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre'
        ];

        return $months[$month] ?? '';
    }

    // Métodos de exportación
    public function exportMaxSamuExits()
    {
        return Excel::download(new MaxSamuExitsExport($this->year), "maximos_salidas_samu_{$this->year}.xlsx");
    }

    public function exportAverageSamuExits()
    {
        return Excel::download(new AverageSamuExitsExport($this->year), "promedio_salidas_samu_{$this->year}.xlsx");
    }

    public function exportAverageResponseTime()
    {
        return Excel::download(new AverageResponseTimeExport($this->year), "tiempo_respuesta_emergencias_{$this->year}.xlsx");
    }

    public function exportManagedCalls()
    {
        return Excel::download(new ManagedCallsExport($this->year), "llamadas_gestionadas_{$this->year}.xlsx");
    }

    public function exportDispatchedCalls()
    {
        return Excel::download(new DispatchedCallsExport($this->year), "llamadas_despachadas_{$this->year}.xlsx");
    }

    public function exportDispatchPercentage()
    {
        return Excel::download(new DispatchPercentageExport($this->year), "porcentaje_despacho_{$this->year}.xlsx");
    }

    public function exportUniquePatients()
    {
        return Excel::download(new UniquePatientsExport($this->year), "pacientes_unicos_{$this->year}.xlsx");
    }

    public function exportUniquePatientsByClassification()
    {
        return Excel::download(new UniquePatientsByClassificationExport($this->year), "pacientes_por_clasificacion_{$this->year}.xlsx");
    }
}
