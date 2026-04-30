<?php

namespace App\Http\Livewire\Samu;

use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Samu\Shift;
use App\Models\Samu\Mobile;
use App\Models\Samu\MobileInService;
use App\Exports\Samu\MobileUsageExport;
use App\Models\Samu\MobileCrew;

class MobilesStats extends Component
{

    public $year = 2026;
    public $month = 3;
    protected $mobilesInMonth;

    public function render()
    {
        $mobiles = Mobile::get();
        $todo = $this->calculateAllHours2();
        $valores = collect($todo['Valores']);
        $totales = $todo['Totales'];
        return view('livewire.samu.mobiles-stats', ['mobiles' => $valores, 'totales' => $totales]);
    }
       
    public function calculateAllHours()
    {
        // Periodo
        $year = $this->year;
        $month = $this->month;
        $out = array();

        //Mobiles en servicio del periodo
        $mobilesInService = MobileInService::whereHas('shift', function ($q) use ($year, $month) {
            $q->whereYear('opening_at', $year)
                ->whereMonth('opening_at', $month);
        })
        ->with(['shift', 'mobile'])
        ->distinct();

        // Mobiles que existen
        $mobiles = Mobile::where('status', 1)->get();
        foreach($mobiles as $mobile){
            $total = 0;
            $mis = $mobilesInService->whereHas('mobile', fn($q) => $q = $mobile->id)->get();
            dd($mis->toArray());
            // $mis = $mis->take(2);
            foreach($mis as $m) {        
                if ($m->shift && $m->shift->opening_at && $m->shift->closing_at) {            
                    // dd($m->shift);
                    $total += intval($m->shift->opening_at->diffInMinutes($m->shift->closing_at));
                }
            }
            $total = intval($total / 60);
            $out[$mobile->code]['code'] = $mobile->code;
            $out[$mobile->code]['total'] = $total;
        }
        return $out;
    }



    public function calculateAllHours2()
    {
        // Periodo
        $year = $this->year;
        $month = $this->month;
        $out = array();
        $TotalFinal = 0;
        $TotalFinalCE = 0;
        $TotalBasicos = 0;
        $TotalBasicosCE = 0;
        $TotalAvanzados = 0;
        $TotalAvanzadosCE = 0;

        //Mobiles en servicio del periodo en diferentes turnos
        $mobilesInService = MobileInService::whereHas('shift', function ($q) use ($year, $month) {
            $q->whereYear('opening_at', $year)
                ->whereMonth('opening_at', $month);
        })
        ->with(['shift', 'mobile', 'crew']);        

        // Mobiles que estuvieron en servicio
        $mobilesIds = $mobilesInService->clone()->get()->map(fn($i) => $i->mobile->id)->unique();
        foreach($mobilesIds as $mobileId){
            // Mobiles en servicio de cierto mobile_id
            $mis = $mobilesInService->clone()->whereHas('mobile', fn($q)=>$q->where('id', $mobileId))->orderBy('id', 'desc')->get();
            $total = 0;
            $totalCE = 0;
            $basico = 0;
            $basicoCE = 0;
            $avanzado = 0;
            $avanzadoCE = 0;
            $z = 0;
            foreach($mis as $m){
                $z++;
                $turno = 0;
                if ($m->shift && $m->shift->opening_at && $m->shift->closing_at) {
                    // Duracion del turno en horas
                    $turno = intval($m->shift->opening_at->diffInMinutes($m->shift->closing_at)) / 60;
                    $status = ($m->status == 0) ? true : false;
                    $crew = $m->currentCrew->map(fn($i)=>$i->pivot->job_type_id)->toArray();
                    // $crew = MobileCrew::where('mobiles_in_service_id', $m->id)->pluck('job_type_id')->toArray();
                    $crew = MobileCrew::where('mobiles_in_service_id', $m->id)->get();
                    // $validCrew = in_array(6, $crew) && in_array(7, $crew);
                    $validCrew = $crew->contains('job_type_id', 6) && $crew->contains('job_type_id', 7);
                    // if($validCrew == false){dd($m, $crew);}
                    // if($validCrew == false && $z>5){dd($m, $crew->pluck('job_type_id'));}
                    // $excepcion = $status || $validCrew;
                    $excepcion = $status;
                    // $excepcion = false;
                    // $turno = $validCrew?$turno:false;
                    /** 
                     * mobilecrew job_type_id 6 and 7 has to be in else exception 
                    */
                    $total += $turno;
                    $totalCE += ($excepcion)?0:$turno;
                    $TotalFinal += $turno;
                    $TotalFinalCE += ($excepcion)?0:$turno;
                    
                }
                switch ($m->type_id) {
                    case 1:
                    case 4:
                    case 5:
                        $basico += $turno;
                        $basicoCE += ($excepcion)?0:$turno;
                        $TotalBasicos += $turno;
                        $TotalBasicosCE += ($excepcion)?0:$turno;
                        break;
                    case 2:
                    case 3:
                    case 6:
                        $avanzado += $turno;
                        $avanzadoCE += ($excepcion)?0:$turno;
                        $TotalAvanzados += $turno;
                        $TotalAvanzadosCE += ($excepcion)?0:$turno;
                        break;
                    default:
                        $basico += $turno;
                        $basicoCE += ($excepcion)?0:$turno;
                        $TotalBasicos += $turno;
                        $TotalBasicosCE += ($excepcion)?0:$turno;
                        break;
                }
                
            }

            $out[$mobileId]['code'] = Mobile::find($mobileId)->code;
            $out[$mobileId]['total'] = $total;
            $out[$mobileId]['totalCE'] = $totalCE;
            $out[$mobileId]['basico'] = $basico;
            $out[$mobileId]['basicoCE'] = $basicoCE;
            $out[$mobileId]['avanzado'] = $avanzado;
            $out[$mobileId]['avanzadoCE'] = $avanzadoCE;
            $out2 = array();

            $out2['Totales']['TotalFinal'] = $TotalFinal;
            $out2['Totales']['TotalFinalCE'] = $TotalFinalCE;
            $out2['Totales']['TotalBasicos'] = $TotalBasicos;
            $out2['Totales']['TotalBasicosCE'] = $TotalBasicosCE;
            $out2['Totales']['TotalAvanzados'] = $TotalAvanzados;
            $out2['Totales']['TotalAvanzadosCE'] = $TotalAvanzadosCE;
            $out2['Valores'] = $out;

        }
        return $out2;
    }


    /**
     * 
     * 
     * DE AQUI PA ABAJO ES 
     * CODIGO BASURA DE
     * LA IA, PURA SHIT
     * 
     */




    /**
     * Calcular el uso neto de un móvil (minutos totales - almuerzo - excepciones > 60 min)
     */
    public function calculateMobileNetUsage(MobileInService $mis)
    {
        // Only count if status = 1 (active) AND has valid crew
        if ($mis->status !== 1 || !$mis->hasValidCrew()) {
            return [
                'shift_minutes' => 0,
                'exception_minutes' => 0,
                'net_usage_minutes' => 0,
                'classification' => $mis->mobile->type->classification ?? 'Unknown',
                'is_valid' => false,
                'status' => $mis->status,
                'has_crew' => $mis->hasValidCrew(),
            ];
        }

        $shift = $mis->shift;

        // 8 hours = 480 minutes per shift
        $shift_minutes = 480;

        // Calculate exception minutes (only stored exceptions > 60 minutes: no_crew, maintenance, cleaning)
        $exception_minutes = 0;
        $exceptions = $mis->exceptions()->exceedsOneHour()->get();

        foreach ($exceptions as $exception) {
            $exc_duration = $exception->started_at->diffInMinutes($exception->ended_at);

            // Verify exception is within shift boundaries
            if ($exception->started_at >= $shift->closing_at || $exception->ended_at <= $shift->opening_at) {
                continue;
            }

            // Adjust if exception crosses shift boundaries
            $started = max($exception->started_at, $shift->opening_at);
            $ended = min($exception->ended_at, $shift->closing_at);

            $exc_duration = intval($started->diffInMinutes($ended));

            // Only include if exceeds 60 minutes
            if ($exc_duration > 60) {
                $exception_minutes += $exc_duration;
            }
        }

        // Cap exception minutes to shift duration
        $exception_minutes = min($exception_minutes, $shift_minutes);

        // Calculate net usage: 8 hours - exceptions
        $net_usage_minutes = $shift_minutes - $exception_minutes;
        $net_usage_minutes = max(0, $net_usage_minutes);

        return [
            'shift_minutes' => $shift_minutes,
            'exception_minutes' => $exception_minutes,
            'net_usage_minutes' => $net_usage_minutes,
            'classification' => $mis->mobile->type->classification ?? 'Unknown',
            'is_valid' => $net_usage_minutes > 0,
            'status' => $mis->status,
            'has_crew' => $mis->hasValidCrew(),
        ];
    }

    /**
     * Calculate unavailability (No Disponible) based on mobile status
     * Count mobiles in shift with status ≠ 1 as 8-hour unavailable
     */
    public function calculateUnavailableMinutes(Shift $shift)
    {
        $unavailable_minutes = 0;

        // Get all mobiles in this shift with status != 1 (not active)
        $mobiles = $shift->mobilesInService()
            ->where('status', '!=', 1)
            ->count();

        // Each counts as 8 hours (480 minutes)
        $unavailable_minutes = $mobiles * 480;

        return $unavailable_minutes;
    }

    /**
     * Calcular la duración de un turno en minutos (entre apertura y cierre)
     */
    public function calculateShiftDurationMinutes(Shift $shift)
    {
        if (!$shift || !$shift->opening_at || !$shift->closing_at) {
            return 0;
        }

        return intval($shift->opening_at->diffInMinutes($shift->closing_at));
    }

    /**
     * Obtener el total de minutos de turnos en un mes para un móvil específico
     * Si no se pasa año/mes usa los de la instancia (`$this->year`, `$this->month`).
     */
    public function getMobileMonthlyShiftMinutes(int $mobileId, $year = null, $month = null)
    {
        $year = $year ?? $this->year;
        $month = $month ?? $this->month;

        $misRecords = MobileInService::where('mobile_id', $mobileId)
            ->where('status', 1)
            ->whereHas('shift', function ($q) use ($year, $month) {
                $q->whereYear('opening_at', $year)
                    ->whereMonth('opening_at', $month);
            })
            ->with(['shift', 'mobile'])
            ->get();

        $total_minutes = 0;

        foreach ($misRecords as $mis) {
            if (!$mis->shift) {
                continue;
            }
            $total_minutes += $this->calculateShiftDurationMinutes($mis->shift);
        }

        return [
            'mobile_id' => $mobileId,
            'mobile_name' => $misRecords->first()->mobile->name ?? null,
            'month' => $month,
            'year' => $year,
            'total_minutes' => $total_minutes,
            'total_hours' => round($total_minutes / 60, 2),
        ];
    }

    /**
     * Obtener el total de horas de turnos en un mes para todos los móviles en servicio
     */
    public function getAllMobilesMonthlyShiftHours($year = null, $month = null)
    {
        $year = $year ?? $this->year;
        $month = $month ?? $this->month;
        // Buscar todos los mobile_id que tuvieron al menos un registro "in service" (status = 1)
        $mobileIds = MobileInService::where('status', 1)
            ->whereHas('shift', function ($q) use ($year, $month) {
                $q->whereYear('opening_at', $year)
                    ->whereMonth('opening_at', $month);
            })
            ->distinct()
            ->pluck('mobile_id');

        $out = [];
        foreach ($mobileIds as $mid) {
            $out[] = $this->getMobileMonthlyShiftMinutes($mid, $year, $month);
        }

        return $out;
    }

    /**
     * Obtener estadísticas de uso por tipo (Advanced/Basic) para un turno
     */
    public function getUsageStatsByType(Shift $shift)
    {
        $mobiles = $shift->mobilesInService()->with(['mobile.type', 'exceptions'])->get();

        $stats = [
            'Advanced' => ['count' => 0, 'total_minutes' => 0, 'mobiles' => []],
            'Basic' => ['count' => 0, 'total_minutes' => 0, 'mobiles' => []],
            'Combined' => ['count' => 0, 'total_minutes' => 0, 'mobiles' => []],
        ];

        foreach ($mobiles as $mis) {
            $usage = $this->calculateMobileNetUsage($mis);

            if (!$usage['is_valid']) {
                continue;
            }

            $classification = $usage['classification'];

            if (!isset($stats[$classification])) {
                continue;
            }

            $stats[$classification]['count']++;
            $stats[$classification]['total_minutes'] += $usage['net_usage_minutes'];
            $stats[$classification]['mobiles'][] = [
                'id' => $mis->id,
                'mobile_name' => $mis->mobile->name ?? 'N/A',
                'mobile_code' => $mis->mobile->code ?? 'N/A',
                'type' => $mis->mobile->type->name ?? 'N/A',
                'usage_minutes' => $usage['net_usage_minutes'],
                'usage_hours' => round($usage['net_usage_minutes'] / 60, 2),
            ];

            // Agregar a Combined
            $stats['Combined']['count']++;
            $stats['Combined']['total_minutes'] += $usage['net_usage_minutes'];
        }

        // Convertir minutos a horas
        foreach ($stats as $key => $stat) {
            $stats[$key]['total_hours'] = round($stat['total_minutes'] / 60, 2);
        }

        return $stats;
    }

    /**
     * Obtener uso de móviles mensualmente (por tipo)
     */
    public function getMobileUsageMonthly()
    {
        $results = [];

        for ($month = 1; $month <= 12; $month++) {
            // Obtener todos los turnos del mes
            $shifts = Shift::whereYear('opening_at', $this->year)
                ->whereMonth('opening_at', $month)
                ->where('status', 1) // Solo turnos cerrados o en desarrollo
                ->get();

            if ($shifts->isEmpty()) {
                $results[] = [
                    'month' => $month,
                    'month_name' => $this->getMonthName($month),
                    'Advanced' => ['count' => 0, 'total_hours' => 0],
                    'Basic' => ['count' => 0, 'total_hours' => 0],
                    'Combined' => ['count' => 0, 'total_hours' => 0],
                ];
                continue;
            }

            // Agregar estadísticas de todos los turnos del mes
            $monthlyStats = [
                'Advanced' => ['count' => 0, 'total_hours' => 0],
                'Basic' => ['count' => 0, 'total_hours' => 0],
                'Combined' => ['count' => 0, 'total_hours' => 0],
            ];

            foreach ($shifts as $shift) {
                $shiftStats = $this->getUsageStatsByType($shift);

                foreach (['Advanced', 'Basic', 'Combined'] as $type) {
                    $monthlyStats[$type]['count'] += $shiftStats[$type]['count'];
                    $monthlyStats[$type]['total_hours'] += $shiftStats[$type]['total_hours'];
                }
            }

            $results[] = array_merge(
                ['month' => $month, 'month_name' => $this->getMonthName($month)],
                $monthlyStats
            );
        }

        return $results;
    }

    /**
     * Exportar uso de móviles a Excel
     */
    public function exportMobileUsage()
    {
        return Excel::download(new MobileUsageExport($this->year), "uso_moviles_{$this->year}.xlsx");
    }
}
