<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\MotherActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\MedicalProgrammer\Rrhh;
use App\Models\MedicalProgrammer\Contract;
// use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\ExecutedActivity;
use App\Models\MedicalProgrammer\OperatingRoom;
use App\Models\MedicalProgrammer\UnscheduledProgramming;
// use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\MedicalProgrammer\CalendarProgramming;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\OperatingRoomSpecialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\OperatingRoomProfession;
use App\Models\MedicalProgrammer\OperatingRoomProgramming;
use App\WsHospital;
use DateTime;
use Illuminate\Support\Facades\Auth;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OperatingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operatingRooms = OperatingRoom::All();
        return view('medical_programmer.operating_rooms.index', compact('operatingRooms'));
    }

    public function programmer()
    {
        return view('medical_programmer.operating_rooms.programmer');
    }

    public function ws_hospital_intervenciones(){
      $response = WsHospital::ws_hospital_intervenciones();
      dd($response);
      foreach ($response['msg']['data'] as $key => $value) {

        $executedActivity = ExecutedActivity::where('correlative', $value['correlativo'])->first();

        if ($executedActivity != null) {
          //actualiza
          $executedActivity->correlative = $value['correlativo'];
          $executedActivity->programming_date = $value['fecha_programacion'];
          $executedActivity->operating_room = $value['pabellon'];
          $executedActivity->origin_request = $value['origen_solicitud'];
          $executedActivity->origin_request_desc = $value['desc_origen'];
          $executedActivity->profession = $value['profesion'];
          $executedActivity->medic_rut = explode('-', $value['medico_rut'])[0];
          $executedActivity->medic_dv = explode('-', $value['medico_rut'])[1];
          $executedActivity->medic_name = $value['medico_nombre'];
          $executedActivity->medic_specialty = $value['medico_especialidad'];
          $executedActivity->medic_specialty_desc = $value['desc_especialidad'];
          $executedActivity->intervention_procedure = $value['procedimiento_intervencion'];
          $executedActivity->intervention_procedure_desc = $value['nom_procedimiento_intervencion'];
          $executedActivity->plane = $value['plano'];
          $executedActivity->plane_desc = $value['desc_plano'];
          $executedActivity->extremity = $value['extremidad'];
          $executedActivity->extremity_desc = $value['desc_extremidad'];
          $executedActivity->estimated_intervention_time = $value['tiempo_est_interv'];
          if ($value['fecha_ingreso_tx'] != null && $value['hora_ingreso_tx'] != null) {
            $executedActivity->tx_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_tx'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_tx'];
          }else{
            $executedActivity->tx_entrance_date = null;
          }
          $executedActivity->intervention_status = $value['estado_intervencion'];
          $executedActivity->intervention_status_desc = $value['desc_estado_int'];
          if ($value['fecha_inicio_intervencion'] != null && $value['hora_inicio_intervencion'] != null) {
            $executedActivity->intervention_start_date =  substr_replace(substr_replace($value['fecha_inicio_intervencion'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_inicio_intervencion'];
          }else{
            $executedActivity->intervention_start_date = null;
          }
          if ($value['fecha_termino_intervencion'] != null && $value['hora_termino_intervencion'] != null) {
            $executedActivity->intervention_end_date =  substr_replace(substr_replace($value['fecha_termino_intervencion'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_termino_intervencion'];
          }else{
            $executedActivity->intervention_end_date = null;
          }
          $executedActivity->surgery_category = $value['categoria_cirugia'];
          $executedActivity->surgery_category_desc = $value['desc_categoria_cir'];
          if ($value['fecha_ingreso_pabellon'] != null && $value['hora_ingreso_pabellon'] != null) {
            $executedActivity->operating_room_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_pabellon'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_pabellon'];
          }else{
            $executedActivity->operating_room_entrance_date = null;
          }
          if ($value['fecha_ingreso_quirofano'] != null && $value['hora_ingreso_quirofano'] != null) {
            $executedActivity->surgery_room_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_quirofano'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_quirofano'];
          }else{
            $executedActivity->surgery_room_entrance_date = null;
          }
          if ($value['fecha_salida_quirofano'] != null && $value['hora_salida_quirofano'] != null) {
            $executedActivity->surgery_room_exit_date =  substr_replace(substr_replace($value['fecha_salida_quirofano'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_salida_quirofano'];
          }else{
            $executedActivity->surgery_room_exit_date = null;
          }
          $executedActivity->table_surgery_category = $value['categoria_cirugia_tabla'];
          $executedActivity->table_surgery_category_desc = $value['desc_categoria_cirugia_tabla'];
          $executedActivity->suspencion_cause = $value['causa_suspension'];
          $executedActivity->suspencion_cause_desc = $value['desc_causa'];

          $executedActivity->save();
        }
        else{
          //nuevo
          $executedActivity = new ExecutedActivity;
          $executedActivity->correlative = $value['correlativo'];
          $executedActivity->programming_date = $value['fecha_programacion'];
          $executedActivity->operating_room = $value['pabellon'];
          $executedActivity->origin_request = $value['origen_solicitud'];
          $executedActivity->origin_request_desc = $value['desc_origen'];
          $executedActivity->profession = $value['profesion'];
          $executedActivity->medic_rut = explode('-', $value['medico_rut'])[0];
          $executedActivity->medic_dv = explode('-', $value['medico_rut'])[1];
          $executedActivity->medic_name = $value['medico_nombre'];
          $executedActivity->medic_specialty = $value['medico_especialidad'];
          $executedActivity->medic_specialty_desc = $value['desc_especialidad'];
          $executedActivity->intervention_procedure = $value['procedimiento_intervencion'];
          $executedActivity->intervention_procedure_desc = $value['nom_procedimiento_intervencion'];
          $executedActivity->plane = $value['plano'];
          $executedActivity->plane_desc = $value['desc_plano'];
          $executedActivity->extremity = $value['extremidad'];
          $executedActivity->extremity_desc = $value['desc_extremidad'];
          $executedActivity->estimated_intervention_time = $value['tiempo_est_interv'];
          if ($value['fecha_ingreso_tx'] != null && $value['hora_ingreso_tx'] != null) {
            $executedActivity->tx_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_tx'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_tx'];
          }else{
            $executedActivity->tx_entrance_date = null;
          }
          $executedActivity->intervention_status = $value['estado_intervencion'];
          $executedActivity->intervention_status_desc = $value['desc_estado_int'];
          if ($value['fecha_inicio_intervencion'] != null && $value['hora_inicio_intervencion'] != null) {
            $executedActivity->intervention_start_date =  substr_replace(substr_replace($value['fecha_inicio_intervencion'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_inicio_intervencion'];
          }else{
            $executedActivity->intervention_start_date = null;
          }
          if ($value['fecha_termino_intervencion'] != null && $value['hora_termino_intervencion'] != null) {
            $executedActivity->intervention_end_date =  substr_replace(substr_replace($value['fecha_termino_intervencion'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_termino_intervencion'];
          }else{
            $executedActivity->intervention_end_date = null;
          }
          $executedActivity->surgery_category = $value['categoria_cirugia'];
          $executedActivity->surgery_category_desc = $value['desc_categoria_cir'];
          if ($value['fecha_ingreso_pabellon'] != null && $value['hora_ingreso_pabellon'] != null) {
            $executedActivity->operating_room_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_pabellon'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_pabellon'];
          }else{
            $executedActivity->operating_room_entrance_date = null;
          }
          if ($value['fecha_ingreso_quirofano'] != null && $value['hora_ingreso_quirofano'] != null) {
            $executedActivity->surgery_room_entrance_date =  substr_replace(substr_replace($value['fecha_ingreso_quirofano'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_ingreso_quirofano'];
          }else{
            $executedActivity->surgery_room_entrance_date = null;
          }
          if ($value['fecha_salida_quirofano'] != null && $value['hora_salida_quirofano'] != null) {
            $executedActivity->surgery_room_exit_date =  substr_replace(substr_replace($value['fecha_salida_quirofano'], "-", 4, 0), "-", 7, 0) . " " . $value['hora_salida_quirofano'];
          }else{
            $executedActivity->surgery_room_exit_date = null;
          }
          $executedActivity->table_surgery_category = $value['categoria_cirugia_tabla'];
          $executedActivity->table_surgery_category_desc = $value['desc_categoria_cirugia_tabla'];
          $executedActivity->suspencion_cause = $value['causa_suspension'];
          $executedActivity->suspencion_cause_desc = $value['desc_causa'];

          $executedActivity->save();
        }
      }

      session()->flash('info', 'Se ha actualizado la informaci??n.');
      return redirect()->back();
    }

    public function reportSpecialty(Request $request)
    {
        $executedActivities = ExecutedActivity::orderBy('created_at','DESC');
        /* Ids correspondiente a las especialidades */
        // $ids_especialidades = array(72002,72001,74009,77002,77001);
        // $ids_specialities = array('9','13','15','19','33'); //variable

        /* Los ids que representan las horas de pabell??n */
        // $ids_actividades_pabellon = array(6,7,8);
        // $ids_actividades = array('6','7','8');
        $motherActivities = MotherActivity::where('id',1)->get();
        $ids_actividades = $motherActivities->first()->activities->pluck('id')->toArray(); //se obtienen actividades de pabell??n

        if($request->has('year_week')) {
            $now = Carbon::now();
            list($year, $week) = explode('-W',$request->year_week);
            $now->setISODate($year,$week);
            $from = $now->startOfWeek()->format('Y-m-d 00:00:00');
            $to   = $now->endOfWeek()->format('Y-m-d 23:59:59');
        }
        else if($request->has('from') AND $request->has('to')){
            $from = $request->has('from'). ' 00:00:00';
            $to   = $request->has('to'). ' 23:59:59';
        }
        else {
            $now = Carbon::now();
            $from = $now->startOfWeek()->format('2020-02-24 00:00:00');
            $to   = $now->endOfWeek()->format('2020-03-01 23:59:59');
        }

        // //programaci??n pabell??n
        // $calendarProgrammings = CalendarProgramming::whereBetween('start_date',[$from,$to])->get();
        // foreach ($calendarProgrammings as $key => $calendarProgramming) {
        //   $calendarProgramming->specialty_id = $calendarProgramming->specialty->id_n820;
        // }

        //obtiene programaci??n m??dica anual
        // $programacion = UnscheduledProgramming::where('year', '2020')->whereIn('activity_id', $ids_actividades)
        //         // ->whereIn('specialty_id', $ids_specialities)
        //         ->get();

        $theoreticalProgrammings = TheoreticalProgramming::whereIn('activity_id', $ids_actividades)
                                                          ->whereBetween('start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                                          ->whereNotNull('specialty_id')
                                                          ->get();
        foreach ($theoreticalProgrammings as $key => $calendarProgramming) {
          $start  = new Carbon($calendarProgramming->start_date);
          $end    = new Carbon($calendarProgramming->end_date);
          $calendarProgramming->duration =  $start->diffInMinutes($end)/60;
        }
        // dd($theoreticalProgrammings);

        //se agrega para dejar como id, al n820
        foreach ($theoreticalProgrammings as $key => $progra) {
          if ($progra->specialty!=null) {
            $progra->specialty_id = $progra->specialty->id_sigte;//substr(str_replace("-","",$progra->specialty->id_sigte), 1);
          }
        }

        // dd($theoreticalProgrammings);
        $teorico_agrupado = $theoreticalProgrammings->groupBy('specialty_id');
        // dd($programacion_agrupada);

        $resumen = [];
        /* Calculo de horas contratadas e inicializaci??n de variables */
        foreach($teorico_agrupado as $codigo_especialidad => $teorico) {
            $resumen[$codigo_especialidad]['nombre_especialidad'] = $teorico->first()->specialty;
            $resumen[$codigo_especialidad]['horas_teorico'] = $teorico->sum('duration');
            $resumen[$codigo_especialidad]['horas_programadas'] = 0;
            $resumen[$codigo_especialidad]['horas_ejecutadas'] = 0;
            $resumen[$codigo_especialidad]['horas_habiles'] = 0;
            $resumen[$codigo_especialidad]['horas_inhabiles'] = 0;
        }




        // foreach ($calendarProgrammings as $key => $calendarProgramming) {
        //   $start  = new Carbon($calendarProgramming->start_date);
        //   $end    = new Carbon($calendarProgramming->end_date);
        //   $resumen[$calendarProgramming->specialty_id]['horas_programadas'] += $start->diffInMinutes($end)/60;
        // }
        // dd($resumen);

        //se obtienen id asociados idn820 para obtener de tabla de ejecutados
        $specialties = Specialty::all();//whereIn('id',$ids_specialities)->get();
        foreach ($specialties as $key => $specialty) {
          $specialty->id_sigte = $specialty->id_sigte;//substr(str_replace("-","",$specialty->id_sigte), 1);
        }

        $ids_specialties_n820 = $specialties->pluck('id_sigte')->toArray();

        $executed_activities = ExecutedActivity::whereBetween('intervention_start_date',[$from,$to])
                                              ->where('intervention_status',2)
                                              ->whereNotNull('intervention_end_date') //debo eliminar
                                              ->get();

        //agrega especialidades que no esten en array de te??rico
        foreach ($executed_activities as $key => $executed_activity) {
          if (!array_key_exists( $executed_activity->medic_specialty ,$resumen )) {
            $resumen[$executed_activity->medic_specialty]['nombre_especialidad'] = Specialty::where('id_sigte',$executed_activity->medic_specialty)->first();
            $resumen[$executed_activity->medic_specialty]['horas_teorico'] = 0;
            $resumen[$executed_activity->medic_specialty]['horas_programadas'] = 0;
            $resumen[$executed_activity->medic_specialty]['horas_ejecutadas'] = 0;
            $resumen[$executed_activity->medic_specialty]['horas_habiles'] = 0;
            $resumen[$executed_activity->medic_specialty]['horas_inhabiles'] = 0;
          }
        }

        //programado en yani
        $programmed_activities = ExecutedActivity::whereBetween('programming_date',[$from,$to])
                                                ->where('intervention_status',1)
                                                ->get();

        //agrega especialidades que no esten en array de te??rico
        foreach ($programmed_activities as $key => $programmed_activity) {
          if (!array_key_exists( $programmed_activity->medic_specialty ,$resumen )) {
            $resumen[$programmed_activity->medic_specialty]['nombre_especialidad'] = Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first();
            $resumen[$programmed_activity->medic_specialty]['horas_teorico'] = 0;
            $resumen[$programmed_activity->medic_specialty]['horas_programadas'] = 0;
            $resumen[$programmed_activity->medic_specialty]['horas_ejecutadas'] = 0;
            $resumen[$programmed_activity->medic_specialty]['horas_habiles'] = 0;
            $resumen[$programmed_activity->medic_specialty]['horas_inhabiles'] = 0;
          }
        }

        //se agrupan
        $executed_activities_agrupaded = $executed_activities->groupBy(['medic_specialty','correlative','medic_rut']);
        $programmed_activities_agruped = $programmed_activities->groupBy(['medic_specialty','correlative','medic_rut']);

        // se obtienen horas programadas
        foreach ($programmed_activities as $key => $programmed_activity) {
          $resumen[$programmed_activity->medic_specialty]['horas_programadas'] += $programmed_activity->estimated_intervention_time/60;
        }

        // dd($resumen);

        //se agregan horas ejecutadas
        $horas_ejecutadas = [];
        if($executed_activities_agrupaded->count() >= 1) {

            /* Inicializar colecci??n */
            $horas_ejecutadas_especialidad = collect();

            foreach($executed_activities_agrupaded as $codigo_especialidad => $especialidad) {
                $horas_ejecutadas[$codigo_especialidad] = collect();
                foreach($especialidad as $numero_correlativo => $correlativo) {
                    foreach($correlativo as $rut_medico => $medico) {
                        /* Crear nueva colecci??n solo con los primeros elementos (agrupar)*/
                        if($medico->first()->intervention_start_date->format('H') >= 8 AND $medico->first()->intervention_start_date->format('H') <= 16){
                            $medico->first()->habil = true;
                        }
                        else {
                            $medico->first()->habil = false;
                        }
                        $horas_ejecutadas[$codigo_especialidad]->push($medico->first());
                    }
                }
            }

            /* Calculo de horas ejecutadas */
            foreach($horas_ejecutadas as $codigo_especialidad => $medicos) {
              // dd($codigo_especialidad);
              if (in_array($codigo_especialidad,array_keys($resumen))) {
                $resumen[$codigo_especialidad]['horas_ejecutadas'] = number_format($medicos->sum('activityDuration')/60/60,1);
                $resumen[$codigo_especialidad]['horas_habiles'] = number_format($medicos->where('habil', true)->sum('activityDuration')/60/60,1);
                $resumen[$codigo_especialidad]['horas_inhabiles'] = number_format($medicos->where('habil', false)->sum('activityDuration')/60/60,1);
              }

            }
        }

        // dd($resumen);

        $request->flash();

        return view('medical_programmer.management.reports.specialty',compact('now','resumen','horas_ejecutadas','executedActivities'));
    }

    public function reportByProfesional(Request $request)
    {
        /* Los ids que representan las horas de pabell??n */
        // $ids_actividades_pabellon = array('6','7','8');
        $motherActivities = MotherActivity::where('id',1)->get();
        $ids_actividades = $motherActivities->first()->activities->pluck('id')->toArray(); //se obtienen actividades de pabell??n

        $now = Carbon::now();
        $profesional = new Rrhh();

        if($request->has('rut') AND $request->has('year_week')) {
            list($year, $week) = explode('-W',$request->year_week);
            $now->setISODate($year,$week);
            $profesional = Rrhh::where('rut',$request->rut)->first();
        }

        /* Listado de m??dicos que sean cirujanos */
        // $rrhh = Rrhh::where('job_title','like','%CIRUJAN%')
        //         ->orderBy('name')
        //         ->orderBy('fathers_family')
        //         ->get
        $rrhh = Rrhh::all();

        /* Listado de contratos del a??o selecionado */
        $contracts = $profesional->contracts->where('year',$now->startOfWeek()->format('Y'));

        /* Programaci??n del profesional del a??o seleccionado */
        // $programming = $profesional->unscheduled_programmings->where('year',$now->startOfWeek()->format('Y'));
        // $programming = $profesional->theoretialProgrammings->whereBetween('start_date',
        //                                                       [$now->startOfWeek()->format('Y-m-d H:i:s'),
        //                                                        $now->endOfWeek()->format('Y-m-d H:i:s')]);
        $theoreticalProgrammings = TheoreticalProgramming::where('rut',$profesional->rut)
                                                         ->whereBetween('start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                                         ->get();
        foreach ($theoreticalProgrammings as $key => $calendarProgramming) {
          $start  = new Carbon($calendarProgramming->start_date);
          $end    = new Carbon($calendarProgramming->end_date);
          $calendarProgramming->duration =  $start->diffInMinutes($end)/60;
        }

        /* Programaci??n de pabellon */
        $programacion_pabellon = $theoreticalProgrammings->whereIn('activity_id',$ids_actividades);
        // dd($programacion_pabellon);

        /* Programaci??n de otras actividades */
        $programacion_otras_actividades = $theoreticalProgrammings->whereNotIn('activity_id',$ids_actividades);

        /* Inicializar colecci??n */
        $current_activities = collect();

        /* Listado de actividades ejecutadas agrupadas por correlativo */
        $current_activities_grouped = $profesional->executedActivities->whereBetween('intervention_start_date',
                                                                      [$now->startOfWeek()->format('Y-m-d H:i:s'),
                                                                       $now->endOfWeek()->format('Y-m-d H:i:s')])
                                                                      ->where('intervention_status',2)
                                                                      ->groupBy('correlative');
                                                                      // dd($current_activities_grouped);
        /* Loop para determinar horario habil o inhabil y agrupar los procedimienots */
        foreach($current_activities_grouped as $correlativo) {
            /* Loop para obtener todos los procedimientos */
            foreach($correlativo as $procedimiento) {
                $procedimientos[] = $procedimiento->intervention_procedure_desc;
            }
            /* Crear nueva variable procedimientos y agregarla al primer elemento */
            $correlativo[0]->procedimientos = implode("<br> ", $procedimientos);

            /* Determinar si es horario habil o inabil */
            if($correlativo[0]->intervention_start_date->format('H') >= 8
                AND $correlativo[0]->intervention_start_date->format('H') <= 16 ) {
                $correlativo[0]->habil = true;
            }
            else {
                $correlativo[0]->habil = false;
            }

            /* Crear nueva colecci??n solo con los primeros elementos (agrupar)*/
            $current_activities->push($correlativo[0]);
        }


        // dd($programacion_pabellon->sum('assigned_hour'));
        /* Calculo de total de horas contratadas */
        $total_contratadas = $total_ejecutadas = $total_habil = $total_inhabil = 0;
        $total_contratadas = $programacion_pabellon->sum('duration')*60*60;
        $total_programadas = $theoreticalProgrammings->sum('duration');
        $total_ejecutadas = $current_activities->sum('activityDuration');
        $total_habil = $current_activities->where('habil',true)->sum('activityDuration');
        $total_inhabil = $current_activities->where('habil',false)->sum('activityDuration');

        $total_contratadas = gmdate("H:i:s", $total_contratadas);
        $total_ejecutadas = gmdate("H:i:s", $total_ejecutadas);
        $total_habil = gmdate("H:i:s", $total_habil);
        $total_inhabil = gmdate("H:i:s", $total_inhabil);

        return view('medical_programmer.management.reports.by_profesional',
            compact('rrhh','now','profesional','current_activities','contracts',
            'programacion_pabellon','programacion_otras_actividades',
            'total_contratadas', 'total_ejecutadas','total_habil','total_inhabil','total_programadas'));
    }

    public function reportWeekly(Request $request)
    {
      $now = Carbon::now();
      if($request->has('year_week')) {
          list($year, $week) = explode('-W',$request->year_week);
          $now->setISODate($year,$week);
      }
      $operatingRoom_name = $request->operatingRoom;

      $colors = ['EBDEF0','FDEBD0','F6DDCC','F2D7D5','D6EAF8','EAEDED','D4E6F1','FDEBD0','FADBD8','D5F5E3'];
      $operatingRooms = OperatingRoom::orderBy('id','ASC')->get();
      $current_activities = ExecutedActivity::select('correlative','medic_specialty_desc','intervention_start_date','intervention_end_date')
                                             ->whereBetween('intervention_start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                             ->where('operating_room',$operatingRoom_name)
                                             ->groupBy('correlative','medic_specialty_desc','intervention_start_date','intervention_end_date')
                                             ->get();

      $specialties = ExecutedActivity::select('medic_specialty_desc',
                                                DB::raw('count(*) as totalProcedimientos'),
                                                DB::raw('ROUND((SUM(TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date))/60),2) AS total_horas'),
                                                DB::raw('ROUND(AVG((TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date)/60)),2) AS promedio_duracion_intervencion'))
                                             ->whereBetween('intervention_start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                             ->where('operating_room',$operatingRoom_name)
                                             ->groupBy('medic_specialty_desc')
                                             ->orderBy('totalProcedimientos','DESC')
                                             ->get();

      $tooltip_info = ExecutedActivity::select('correlative','medic_name','profession','intervention_procedure_desc','intervention_start_date','intervention_end_date')
                                    ->whereBetween('intervention_start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                    ->where('operating_room','LIKE',$operatingRoom_name)
                                    ->orderBy('correlative', 'ASC')->orderBy('medic_name', 'ASC')
                                    ->get();

      //dd($tooltip_info);
      foreach ($current_activities as $key => $activity) {
        //$valor = '<table>';
        $valor = '';
        foreach ($tooltip_info as $key => $info) {
          if($activity->correlative == $info->correlative){
            //$valor = $valor . '<tr><td>' . $info->medic_name . '</td><td>' . $info->profession . '</td></tr>';
            $valor = $valor . $info->medic_name . ' - ' . $info->profession . ' - ' . $info->intervention_procedure_desc . '<br>';
          }
        }
        //$valor = $valor . '</table>';
        $activity->tooltip = $valor;
      }

      //dd($current_activities);

      foreach ($specialties as $key => $specialty) {
        $specialty->color = $colors[$key];
        $specialty->prom = round(($specialty->total_horas * 100 / $specialties->sum('total_horas')),2);
      }
      $specialties = $specialties->sortByDesc('prom');

      return view('medical_programmer.management.reports.weekly',compact('now','current_activities','operatingRooms','specialties','operatingRoom_name'));
    }

    public function reportDiary(Request $request)
    {
      //$now = Carbon::now();
      $now = $request->get('day');
      //$now = Carbon::createFromFormat('Y-m-d\TH:i',$request->get('day'))->format('Y-m-d 08:00:00');
      //dd($now);

      $colors = ['EBDEF0','FDEBD0','F6DDCC','F2D7D5','D6EAF8','EAEDED','D4E6F1','FDEBD0','FADBD8','D5F5E3'];
      $operatingRooms = OperatingRoom::where('medic_box',0)->orderBy('id','ASC')->get();
      $current_activities = ExecutedActivity::select('correlative','operating_room','medic_specialty_desc','intervention_start_date','intervention_end_date')
                                            ->whereBetween('intervention_start_date', [$now . " 00:00:00", $now . " 23:59:59"])
                                            ->groupBy('correlative','operating_room','medic_specialty_desc','intervention_start_date','intervention_end_date')
                                            ->get();

      $specialties = ExecutedActivity::select('medic_specialty_desc',
                                               DB::raw('count(*) as totalProcedimientos'),
                                               DB::raw('ROUND((SUM(TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date))/60),2) AS total_horas'),
                                               DB::raw('ROUND(AVG((TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date)/60)),2) AS promedio_duracion_intervencion'))
                                            ->whereBetween('intervention_start_date', [$now . " 00:00:00", $now . " 23:59:59"])
                                            ->groupBy('medic_specialty_desc')
                                            // ->orderBy('totalProcedimientos','DESC')
                                            ->get();

      $tooltip_info = ExecutedActivity::select('correlative','medic_name','profession','intervention_procedure_desc','intervention_start_date','intervention_end_date')
                                    ->whereBetween('intervention_start_date', [$now . " 00:00:00", $now . " 23:59:59"])
                                    ->orderBy('correlative', 'ASC')->orderBy('medic_name', 'ASC')
                                    ->get();

      //se agregan tooltip a actividades del calendario
      foreach ($current_activities as $key => $activity) {
        $valor = '';
        foreach ($tooltip_info as $key => $info) {
          if($activity->correlative == $info->correlative){
            $valor = $valor . $info->medic_name . ' - ' . $info->profession . ' - ' . $info->intervention_procedure_desc . '<br>';
          }
        }
        $activity->tooltip = $valor;
      }

      //se agrega promedio a especialidades agrupadas
      // $specialties = Specialty::all();

      foreach ($specialties as $key => $specialty) {
        $specialty->color = $colors[$key];
        $specialty->prom = round(($specialty->total_horas * 100 / $specialties->sum('total_horas')),2);
      }
      $specialties = $specialties->sortByDesc('prom');
      // dd($specialties);

      return view('medical_programmer.management.reports.diary',compact('now','current_activities','operatingRooms','specialties','colors'));
    }

    public function report1(Request $request)
    {
      $from = $request->get('from');
      $to = $request->get('to');
      //$operatingRoom = $request->operatingRoom;

      //$operatingRooms = OperatingRoom::orderBy('id','ASC')->get();

      $colors = ['EBDEF0','FDEBD0','F6DDCC','F2D7D5','D6EAF8','EAEDED','D4E6F1','FDEBD0','FADBD8','D5F5E3'];
      //total de horas uso por medico
      // $executedActivity = ExecutedActivity::select('medic_specialty_desc','medic_name',
      //                                           DB::raw('count(*) as totalProcedimientos'),
      //                                           DB::raw('ROUND((SUM(TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date))/60),2) AS total_horas'))
      //                                        ->whereBetween('intervention_start_date',[$from . " 00:00:00", $to . " 23:59:59"])
      //                                        ->where('operating_room','PC4')
      //                                        ->groupBy('medic_specialty_desc','medic_name')
      //                                        ->orderBy('totalProcedimientos','DESC')
      //                                        ->get();

      $sql_query = "SELECT T2.law,T2.weekly_hours, IFNULL(T2.YEAR, anho) AS anho, IFNULL(T2.rut,medic_rut) AS rut, IFNULL(NAME, medic_name) AS nombre, T.mes, T.Semana, T.medic_specialty_desc, T.total_horas
                    FROM (SELECT Anho,
                    		       Mes,
                    				 Semana,
                    				 medic_specialty_desc,
                    				 medic_rut,
                    				 medic_name,
                    				 ROUND((SUM(TIMESTAMPDIFF(MINUTE, T.intervention_start_date, T.intervention_end_date))/60),2) AS total_horas
                    		FROM (
                    		SELECT YEAR(intervention_start_date) AS Anho,
                    				 MONTHNAME(intervention_start_date) AS Mes,
                    				 FLOOR((DayOfMonth(intervention_start_date)-1)/7)+1 AS Semana,
                    				 medic_specialty_desc, medic_rut, medic_name,
                    				 intervention_start_date, intervention_end_date,profession
                    		FROM mp_executed_activities
                    		where intervention_start_date BETWEEN '$from 00:00:00' AND '$to 23:59:59'

                    		GROUP BY YEAR(intervention_start_date),
                    		         MONTHNAME(intervention_start_date),
                    				   FLOOR((DayOfMonth(intervention_start_date)-1)/7)+1,
                    				   medic_rut, medic_name, medic_specialty_desc, intervention_start_date, intervention_end_date,profession) AS T
                    		GROUP BY Anho,
                    		         Mes,
                    					Semana,
                    					medic_specialty_desc,
                    					medic_rut,
                    					medic_name
                    		ORDER BY ROUND((SUM(TIMESTAMPDIFF(MINUTE, T.intervention_start_date, T.intervention_end_date))/60),2) DESC) AS T RIGHT JOIN
                    (SELECT rrhh.rut, (concat(rrhh.NAME,' ',fathers_family,' ',mothers_family)) AS name, cont.YEAR, cont.law, cont.weekly_hours
                    FROM mp_rrhh AS rrhh INNER JOIN
                         mp_contracts AS cont ON rrhh.rut = cont.rut
                    WHERE cont.law = 'LEY 15.076') AS T2 ON T.Anho = T2.YEAR AND T.medic_rut = T2.rut

                    ORDER BY total_horas DESC";
      $executed_activities = DB::connection('mysql')->select($sql_query);

      // dd($executed_activities);

      //promedio de uso pabellon por especialidad
      // $average_total = ExecutedActivity::select('medic_specialty_desc',
      //                                           DB::raw('ROUND((SUM(TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date))/60),2) AS total_horas'),
      //                                           DB::raw('ROUND(AVG((TIMESTAMPDIFF(MINUTE, intervention_start_date, intervention_end_date)/60)),2) AS promedio_duracion_intervencion'))
      //                                        ->whereBetween('intervention_start_date',[$from . " 00:00:00", $to . " 23:59:59"])
      //                                        ->where('operating_room','PC4')
      //                                        ->groupBy('medic_specialty_desc')
      //                                        ->get();

      $sql_query = "SELECT medic_specialty_desc,
                				 ROUND((SUM(TIMESTAMPDIFF(MINUTE, T.intervention_start_date, T.intervention_end_date))/60),2) AS total_horas,
                         ROUND(AVG((TIMESTAMPDIFF(MINUTE, T.intervention_start_date, T.intervention_end_date)/60)),2) AS promedio_duracion_intervencion
                		FROM (
                		SELECT YEAR(intervention_start_date) AS Anho,
                				 MONTHNAME(intervention_start_date) AS Mes,
                				 FLOOR((DayOfMonth(intervention_start_date)-1)/7)+1 AS Semana,
                				 medic_specialty_desc, medic_rut, medic_name,
                				 intervention_start_date, intervention_end_date,profession
                		FROM mp_executed_activities
                		where intervention_start_date BETWEEN '$from 00:00:00' AND '$to 23:59:59'
                		AND operating_room = 'PC4'
                		GROUP BY YEAR(intervention_start_date),
                		         MONTHNAME(intervention_start_date),
                				   FLOOR((DayOfMonth(intervention_start_date)-1)/7)+1,
                				   medic_rut, medic_name, medic_specialty_desc, intervention_start_date, intervention_end_date,profession) AS T
                		GROUP BY medic_specialty_desc";

      $average_total = DB::connection('mysql')->select($sql_query);
      $average_total = collect($average_total);
      // dd($average_total);

      //se agrega promedio a especialidades agrupadas
      foreach ($average_total as $key => $specialty) {
        $specialty->color = $colors[$key];
        $specialty->prom = round(($specialty->total_horas * 100 / $average_total->sum('total_horas')),2);
      }
      $average_total = $average_total->sortByDesc('prom');

      foreach ($executed_activities as $key => $executed) {
        $executed->color = null;
        foreach ($average_total as $key => $average) {
          if($executed->medic_specialty_desc == $average->medic_specialty_desc){
            $executed->color = $average->color;
          }
        }
      }
      // dd($executed_activities);
      // foreach ($executed_activities as $key => $specialty) {
      //   foreach ($average_total as $key => $average) {
      //     $specialty->
      //   }
      //   $specialty->color = $colors[$key];
      // }

      return view('medical_programmer.management.reports.report1',compact('from','to','average_total','executed_activities',));
    }

    public function reportUrgency(Request $request)
    {
        $from = '2020-02-01 00:00:00';
        $to = '2020-03-12 23:59:59';
        /* Los ids que representan las horas de pabell??n */
        $ids_actividades_pabellon = array(6,7,8);

        //echo '<pre>';

        $rrhh = Rrhh::orderBy('name')
                ->where('job_title','like','%CIRUJAN%')
                ->whereHas('contracts', function ($q) {
                    $q->where('law', 'LEY 15.076');
                })->with('contracts')->get();

        foreach($rrhh as $usuario) {
            $resumen[$usuario->rut]['nombre'] = $usuario->fullName;
            $resumen[$usuario->rut]['cod_especialidad'] = '';
            $resumen[$usuario->rut]['nombre_especialidad'] = '';
            $resumen[$usuario->rut]['horas_programadas'] = $usuario->contracts->where('law', 'LEY 15.076')->sum('weekly_hours');
            $resumen[$usuario->rut]['horas_ejecutadas'] = 0;
            //$resumen[$usuario->rut]['titulo'] = $usuario->job_title;
        }

        $actividades = ExecutedActivity::where('operating_room','PC4')
            ->whereBetween('intervention_start_date',[$from,$to])
            ->get();

        $actividades_agrupadas = $actividades->groupBy(['medic_specialty','correlative','medic_rut']);

        foreach($actividades_agrupadas as $cod_esp => $especialidades) {
            $horas_ejecutadas_especialidad[$cod_esp] = collect();
            foreach($especialidades as $correlativos) {
                foreach($correlativos as $medicos) {
                    $horas_ejecutadas_especialidad[$cod_esp]->push($medicos->first());
                }
            }
        }
        //print_r($horas_ejecutadas_especialidad[72002]->sum('activityDuration'));

        foreach($horas_ejecutadas_especialidad as $key => $horas) {
            $resumen_por_especialidad[$key]['nombre'] = $horas->first()->medic_specialty_desc;
            $resumen_por_especialidad[$key]['horas'] = number_format($horas->sum('activityDuration')/60/60,2);
            foreach($horas->groupBy('medic_rut') as $arr_medico) {
                $resumen[$arr_medico->first()->medic_rut]['nombre'] = $arr_medico->first()->medic_name;
                $resumen[$arr_medico->first()->medic_rut]['cod_especialidad'] = $arr_medico->first()->medic_specialty;
                $resumen[$arr_medico->first()->medic_rut]['nombre_especialidad'] = $arr_medico->first()->medic_specialty_desc;
                $resumen[$arr_medico->first()->medic_rut]['horas_ejecutadas'] = number_format($arr_medico->sum('activityDuration')/60/60,1);
                if(!isset($resumen[$arr_medico->first()->medic_rut]['horas_programadas'])) $resumen[$arr_medico->first()->medic_rut]['horas_programadas'] = 0;
            }
        }


        return view('medical_programmer.operating_rooms.reports.urgency', compact('resumen','resumen_por_especialidad'));
        //print_r($resumen_por_especialidad);
    }

    public function reportProgramedVsTeoric(Request $request)
    {
      // $now = Carbon::now();
      // $now = Carbon::parse("2020-11-16");
      if($request->has('year_week')) {
          $now = Carbon::now();
          list($year, $week) = explode('-W',$request->year_week);
          $now->setISODate($year,$week);
          $from = $now->startOfWeek()->format('Y-m-d 00:00:00');
          $to   = $now->endOfWeek()->format('Y-m-d 23:59:59');
      }
      else if($request->has('from') AND $request->has('to')){
          $from = $request->has('from'). ' 00:00:00';
          $to   = $request->has('to'). ' 23:59:59';
      }
      else {
          $now = Carbon::now();
          $from = $now->startOfWeek()->format('2020-02-24 00:00:00');
          $to   = $now->endOfWeek()->format('2020-03-01 23:59:59');
      }

      // $now = Carbon::createFromFormat('d/m/Y H:i:s',  '16/11/2020 00:00:00');
      // dd($now);

      $motherActivities = MotherActivity::where('id',1)->get();
      $ids_actividades = $motherActivities->first()->activities->pluck('id')->toArray(); //se obtienen actividades de pabell??n

      //te??rico
      $theoreticalProgrammings = TheoreticalProgramming::whereIn('activity_id', $ids_actividades)
                                                      ->whereBetween('start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                                      ->whereNotNull('specialty_id')
                                                      ->get();
      foreach ($theoreticalProgrammings as $key => $calendarProgramming) {
        $start  = new Carbon($calendarProgramming->start_date);
        $end    = new Carbon($calendarProgramming->end_date);
        $calendarProgramming->duration =  $start->diffInMinutes($end)/60;
      }

      $array = array();
      // foreach ($theoreticalProgrammings as $key => $theoreticalProgramming) {
      //   $array[$theoreticalProgramming->specialty->specialty_name]['theoretical_duration'] = 0;
      //   $array[$theoreticalProgramming->specialty->specialty_name]['executed_duration'] = 0;
      //   $array[$theoreticalProgramming->specialty->specialty_name]['programed_duration'] = 0;
      // }

      //pabellones
      $operatingRoomProgrammings = OperatingRoomProgramming::whereBetween('start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                                           // ->where('operating_room_id',1)
                                                           ->select('start_date','end_date','operating_room_id')
                                                           ->groupBy(['start_date','end_date','operating_room_id'])
                                                           ->get();
      // dd($operatingRoomProgrammings);

      foreach ($operatingRoomProgrammings as $key => $operatingRoomProgramming) {
        $start  = new Carbon($operatingRoomProgramming->start_date);
        $end    = new Carbon($operatingRoomProgramming->end_date);
        $operatingRoomProgramming->duration =  $start->diffInMinutes($end)/60;
      }
      // dd($operatingRoomProgrammings);

      $OperatingRoomArray = array();
      $OperatingRoomSpecialtiesArray = array();
      foreach ($operatingRoomProgrammings as $key => $operatingRoomProgramming) {
        $OperatingRoomArray[$operatingRoomProgramming->operatingRoom->name]['theoretical_duration'] = 0;
        $OperatingRoomArray[$operatingRoomProgramming->operatingRoom->name]['executed_duration'] = 0;
        $OperatingRoomArray[$operatingRoomProgramming->operatingRoom->name]['programed_duration'] = 0;

        // $OperatingRoomSpecialtiesArray[$operatingRoomProgramming->operatingRoom->name][Specialty::where('id_sigte',$operatingRoomProgramming->specialty->id_sigte)->first()->specialty_name]['theoretical_duration'] = 0;
        // $OperatingRoomSpecialtiesArray[$operatingRoomProgramming->operatingRoom->name][Specialty::where('id_sigte',$operatingRoomProgramming->specialty->id_sigte)->first()->specialty_name]['executed_duration'] = 0;
        // $OperatingRoomSpecialtiesArray[$operatingRoomProgramming->operatingRoom->name][Specialty::where('id_sigte',$operatingRoomProgramming->specialty->id_sigte)->first()->specialty_name]['programed_duration'] = 0;
      }



      //actividades ejecutadas de yani
      $executed_activities = ExecutedActivity::whereBetween('intervention_start_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                             ->where('intervention_status',2) // ejecutado
                                             ->whereNotNull('intervention_end_date') //debo eliminar
                                             ->select('correlative','operating_room','intervention_start_date','intervention_end_date') //'medic_specialty',
                                             ->groupBy('correlative','operating_room','intervention_start_date','intervention_end_date') //'medic_specialty',
                                             ->get();

      // dd($executed_activities);
      // foreach ($executed_activities as $key => $executed_activity) {
      //   $array[Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['theoretical_duration'] = 0;
      //   $array[Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['executed_duration'] = 0;
      //   $array[Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['programed_duration'] = 0;
      // }

      foreach ($executed_activities as $key => $executed_activity) {
        $OperatingRoomArray[$executed_activity->operating_room]['theoretical_duration'] = 0;
        $OperatingRoomArray[$executed_activity->operating_room]['executed_duration'] = 0;
        $OperatingRoomArray[$executed_activity->operating_room]['programed_duration'] = 0;

        // $OperatingRoomSpecialtiesArray[$executed_activity->operating_room][Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['theoretical_duration'] = 0;
        // $OperatingRoomSpecialtiesArray[$executed_activity->operating_room][Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['executed_duration'] = 0;
        // $OperatingRoomSpecialtiesArray[$executed_activity->operating_room][Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['programed_duration'] = 0;
      }



      //actividades programadas de yani
      $programmed_activities = ExecutedActivity::select('correlative','operating_room','programming_date', 'estimated_intervention_time') //'medic_specialty',
                                             ->whereBetween('programming_date',[$now->startOfWeek()->format('Y-m-d H:i:s'),$now->endOfWeek()->format('Y-m-d H:i:s')])
                                             ->where('intervention_status',1) // ejecutado
                                             ->whereNotIn('medic_specialty',['92-000']) //no considera odontolog??a
                                             ->groupBy('correlative','operating_room','programming_date','estimated_intervention_time') //'medic_specialty',
                                             ->get();

      // foreach ($programmed_activities as $key => $programmed_activity) {
      //   $array[Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['theoretical_duration'] = 0;
      //   $array[Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['executed_duration'] = 0;
      //   $array[Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['programed_duration'] = 0;
      // }

      // se deja comentado, porque en yani la programaci??n no tiene asignado pabell??n.

      // foreach ($programmed_activities as $key => $programmed_activity) {
      //   $OperatingRoomArray[$programmed_activity->operating_room]['theoretical_duration'] = 0;
      //   $OperatingRoomArray[$programmed_activity->operating_room]['executed_duration'] = 0;
      //   $OperatingRoomArray[$programmed_activity->operating_room]['programed_duration'] = 0;
      //
      //   $OperatingRoomSpecialtiesArray[$programmed_activity->operating_room][Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['theoretical_duration'] = 0;
      //   $OperatingRoomSpecialtiesArray[$programmed_activity->operating_room][Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['executed_duration'] = 0;
      //   $OperatingRoomSpecialtiesArray[$programmed_activity->operating_room][Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['programed_duration'] = 0;
      // }



      // //te??rico
      // foreach ($theoreticalProgrammings as $key => $theoreticalProgramming) {
      //   $array[$theoreticalProgramming->specialty->specialty_name]['theoretical_duration'] += $theoreticalProgramming->duration;
      // }
      //
      // foreach ($executed_activities as $key => $executed_activity) {
      //   $array[Specialty::where('id_sigte',$executed_activity->medic_specialty)->first()->specialty_name]['executed_duration'] += $executed_activity->activityDuration/60/60;
      // }
      //
      // foreach ($programmed_activities as $key => $programmed_activity) {
      //   $array[Specialty::where('id_sigte',$programmed_activity->medic_specialty)->first()->specialty_name]['programed_duration'] += $programmed_activity->estimated_intervention_time/60;
      // }

      //por pabellones

      foreach ($operatingRoomProgrammings as $key => $operatingRoomProgramming) {
        $OperatingRoomArray[$operatingRoomProgramming->operatingRoom->name]['theoretical_duration'] += $operatingRoomProgramming->duration;

        // $OperatingRoomSpecialtiesArray[$operatingRoomProgramming->operatingRoom->name][Specialty::where('id_sigte',$operatingRoomProgramming->specialty->id_sigte)->first()->specialty_name]['theoretical_duration'] = 0;
      }

      // dd($executed_activities);
      foreach ($executed_activities as $key => $executed_activity) {
        // dd($executed_activity->activityDuration/60/60);
        $OperatingRoomArray[$executed_activity->operating_room]['executed_duration'] += $executed_activity->activityDuration/60/60;
      }

      // foreach ($programmed_activities as $key => $programmed_activity) {
      //   $OperatingRoomArray[$programmed_activity->operating_room]['programed_duration'] += $programmed_activity->estimated_intervention_time/60;
      // }

      // dd($OperatingRoomArray);

      // dd($array);

      //se obtiene programaci??n de pabellones
      $operatingRooms = OperatingRoom::where('medic_box',0)->orderBy('name','ASC')->get();
      // dd($OperatingRoomArray);

      $request->flash();

      return view('medical_programmer.management.reports.ProgramedVsTeoric',compact('now','array','operatingRooms','OperatingRoomSpecialtiesArray','OperatingRoomArray'));
    }

    function cmp($a, $b)
    {
        return strcmp($a["theoretical_duration"], $b["theoretical_duration"]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_programmer.operating_rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operatingRoom = new OperatingRoom($request->All());
        //$operatingRoom->establishment_id = 1;
        //$operatingRoom->user_id = Auth::id();
        $operatingRoom->save();

        return redirect()->route('medical_programmer.operating_rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SurgicalPavilion  $surgicalPavilion
     * @return \Illuminate\Http\Response
     */
    public function show(SurgicalPavilion $surgicalPavilion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(OperatingRoom $operatingRoom)
    {
        $specialties = Specialty::orderBy('specialty_name','ASC')->get();
        $professions = Profession::orderBy('profession_name','ASC')->get();
        return view('medical_programmer.operating_rooms.edit', compact('operatingRoom','specialties', 'professions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperatingRoom $operatingRoom)
    {
        $operatingRoom->fill($request->all());
        // $operatingRoom->user_id = Auth::id();
        $operatingRoom->save();

        // //asigna especialidades
        // if ($request->input('specialties')!=null) {
        //     foreach ($request->input('specialties') as $key => $value) {
        //         $OperatingRoomSpecialty = OperatingRoomSpecialty::where('specialty_id',$value)
        //                                                         ->where('operating_room_id', $operatingRoom->id)
        //                                                         ->get();
        //         if ($OperatingRoomSpecialty->count() == 0) {
        //             $OperatingRoomSpecialty = new OperatingRoomSpecialty();
        //             $OperatingRoomSpecialty->specialty_id = $value;
        //             $OperatingRoomSpecialty->operating_room_id = $operatingRoom->id;
        //             $OperatingRoomSpecialty->save();
        //         }
        //     }
        // }

        //asigna especialidades
        if ($request->input('specialties') == null) {
          $OperatingRoomSpecialty = OperatingRoomSpecialty::where('operating_room_id', $operatingRoom->id)->delete();
        }

        if($request->input('specialties')!=null){

            //elimina lo no seleccionado
            $OperatingRoomSpecialties = OperatingRoomSpecialty::where('operating_room_id', $operatingRoom->id)->whereNotIn('specialty_id',$request->input('specialties'))->delete();

            //agrega las nuevas especialidades
            foreach ($request->input('specialties') as $key => $value) {
                $OperatingRoomSpecialty = OperatingRoomSpecialty::where('specialty_id',$value)
                                                                ->where('operating_room_id', $operatingRoom->id)
                                                                ->first();

                if ($OperatingRoomSpecialty == null) {
                    $OperatingRoomSpecialty = new OperatingRoomSpecialty();
                    $OperatingRoomSpecialty->specialty_id = $value;
                    $OperatingRoomSpecialty->operating_room_id = $operatingRoom->id;
                    $OperatingRoomSpecialty->save();
                }
            }
        }

        //asigna profesiones
        if ($request->input('professions') == null) {
          $OperatingRoomProfessions = OperatingRoomProfession::where('operating_room_id', $operatingRoom->id)->delete();
        }

        if($request->input('professions')!=null){

            //elimina lo no seleccionado
            $OperatingRoomProfessions = OperatingRoomProfession::where('operating_room_id', $operatingRoom->id)->whereNotIn('profession_id',$request->input('professions'))->delete();

            //agrega las nuevas especialidades
            foreach ($request->input('professions') as $key => $value) {
                $OperatingRoomProfession = OperatingRoomProfession::where('profession_id',$value)
                                                                ->where('operating_room_id', $operatingRoom->id)
                                                                ->first();

                if ($OperatingRoomProfession == null) {
                    $OperatingRoomProfession = new OperatingRoomProfession();
                    $OperatingRoomProfession->profession_id = $value;
                    $OperatingRoomProfession->operating_room_id = $operatingRoom->id;
                    $OperatingRoomProfession->save();
                }
            }
        }

        session()->flash('info', 'El pabell??n ha sido editado.');
        return redirect()->route('medical_programmer.operating_rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperatingRoom $operatingRoom)
    {
      //se elimina la cabecera y detalles
      $operatingRoom->delete();
      session()->flash('success', 'El pabell??n ha sido eliminado');
      return redirect()->route('medical_programmer.operating_rooms.index');
    }
}
