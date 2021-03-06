<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\UnscheduledProgramming;
use App\Models\MedicalProgrammer\TheoreticalProgramming;
use App\Models\MedicalProgrammer\CutOffDate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CutOffDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array_programacion_medica = null;
        $array_programacion_no_medica = null;
        $cutoffdates = CutOffDate::all();
        return view('medical_programmer.cutoffdates.index', compact('cutoffdates','array_programacion_medica', 'array_programacion_no_medica'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $cutoffdates = CutOffDate::orderBy('date','ASC')->get();
      return view('medical_programmer.cutoffdates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cutOffDate = new CutOffDate($request->All());
      //$cutOffDate->user_id = Auth::id();
      $cutOffDate->save();

      session()->flash('info', 'La fecha de corte ha sido creada.');
      return redirect()->route('medical_programmer.cutoffdates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CutOffDate $cutoffdate)
    {
      return view('medical_programmer.cutoffdates.edit', compact('cutoffdate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CutOffDate $cutoffdate)
    {
      $cutoffdate->fill($request->all());
      //$cutoffdate->user_id = Auth::id();
      $cutoffdate->save();

      session()->flash('info', 'La fecha de corte ha sido editada.');
      return redirect()->route('medical_programmer.cutoffdates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CutOffDate $cutoffdate)
    {
      $cutoffdate->delete();
      session()->flash('success', 'La fecha de corte ha sido eliminada');
      return redirect()->route('medical_programmer.cutoffdates.index');
    }

    public function consolidated_programming(CutOffDate $cutoffdate)
    {
        //obtiene comienzo y termino del periodo
        $monday = Carbon::parse($cutoffdate->date)->startOfWeek();
        $sunday = Carbon::parse($cutoffdate->date)->endOfWeek();
        //obtiene datos programables del per??odo
        $theoreticalProgrammings = TheoreticalProgramming::whereBetween('start_date',[$monday,$sunday])
                                                        ->whereNull('contract_day_type')
                                                        ->get();

        $date = new Carbon($cutoffdate->date);
        //obtiene datos NO programables del a??o
        $unscheduledProgrammings = UnscheduledProgramming::where('year',$date->get('year'))->get();

        //se obtiene fechas de inicio y termino de cada isEventOverDiv
        foreach ($theoreticalProgrammings as $key => $theoricalProgramming) {
          $start  = new Carbon($theoricalProgramming->start_date);
          $end    = new Carbon($theoricalProgramming->end_date);
          $theoricalProgramming->duration_theorical_programming = $start->diffInMinutes($end)/60;
        }


        //programables - PROGRAMACION M??DICA
        $array_programacion_medica = array();
        foreach ($theoreticalProgrammings->whereNotNull('specialty_id') as $key => $theoricalProgramming) {
          if ($theoricalProgramming->contract) {
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['assigned_hour'] = 0;
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['rdto_hour'] = 0;
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['theoricalProgramming_id'] = 0;
          }
        }
        foreach ($theoreticalProgrammings->whereNotNull('specialty_id') as $key => $theoricalProgramming) {
          if ($theoricalProgramming->contract) {
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['assigned_hour'] += $theoricalProgramming->duration_theorical_programming;
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['rdto_hour'] = $theoricalProgramming->performance;//$theoricalProgramming->specialty->activities->where('id',$theoricalProgramming->activity->id)->first()->pivot->performance;
            $array_programacion_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->specialty->id_specialty . ' - ' . $theoricalProgramming->specialty->specialty_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['theoricalProgramming_id'] = $theoreticalProgrammings->whereNotNull('specialty_id')->where('activity_id',$theoricalProgramming->activity_id)->toArray();
          }
        }

        //NO programables - PROGRAMACION M??DICA
        foreach ($unscheduledProgrammings->whereNotNull('specialty_id') as $key => $unscheduledProgramming) {
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['assigned_hour'] = 0;
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['rdto_hour'] = 0;
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['unscheduledProgramming_id'] = 0;
        }
        foreach ($unscheduledProgrammings->whereNotNull('specialty_id') as $key => $unscheduledProgramming) {
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['assigned_hour'] += $unscheduledProgramming->assigned_hour;
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['rdto_hour'] = $unscheduledProgramming->hour_performance;//$unscheduledProgramming->specialty->activities->where('id',$unscheduledProgramming->activity->id)->first()->pivot->performance;
            $array_programacion_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->specialty->id_specialty . ' - ' . $unscheduledProgramming->specialty->specialty_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['unscheduledProgramming_id'] = $unscheduledProgrammings->whereNotNull('specialty_id')->where('activity_id',$unscheduledProgramming->activity_id)->toArray();
        }
        // dd($array_programacion_medica);




        //programables - PROGRAMACION NO M??DICA
        $array_programacion_no_medica = array();
        foreach ($theoreticalProgrammings->whereNotNull('profession_id') as $key => $theoricalProgramming) {
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['assigned_hour'] = 0;
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['rdto_hour'] = 0;
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['theoricalProgramming_id'] = 0;
        }
        foreach ($theoreticalProgrammings->whereNotNull('profession_id') as $key => $theoricalProgramming) {
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['assigned_hour'] += $theoricalProgramming->duration_theorical_programming;
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['rdto_hour'] = $theoricalProgramming->performance;//$theoricalProgramming->profession->activities->where('id',$theoricalProgramming->activity->id)->first()->pivot->performance;
            $array_programacion_no_medica[$theoricalProgramming->user_id . " - " . $theoricalProgramming->user->OfficialFullName][$theoricalProgramming->contract->contract_id]
                                      [$theoricalProgramming->profession->id_profession . ' - ' . $theoricalProgramming->profession->profession_name]
                                      [$theoricalProgramming->activity->id_activity . ' - ' . $theoricalProgramming->activity->activity_name]['theoricalProgramming_id'] = $theoreticalProgrammings->whereNotNull('profession_id')->where('activity_id',$theoricalProgramming->activity_id)->toArray();
        }
        //NO programables - PROGRAMACION NO M??DICA
        foreach ($unscheduledProgrammings->whereNotNull('profession_id') as $key => $unscheduledProgramming) {
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['assigned_hour'] = 0;
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['rdto_hour'] = 0;
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['unscheduledProgramming_id'] = 0;
        }
        foreach ($unscheduledProgrammings->whereNotNull('profession_id') as $key => $unscheduledProgramming) {
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['assigned_hour'] += $unscheduledProgramming->assigned_hour;
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['rdto_hour'] = $unscheduledProgramming->hour_performance;//$unscheduledProgramming->profession->activities->where('id',$unscheduledProgramming->activity->id)->first()->pivot->performance;
            $array_programacion_no_medica[$unscheduledProgramming->user_id . " - " . $unscheduledProgramming->user->OfficialFullName][$unscheduledProgramming->contract->contract_id]
                                      [$unscheduledProgramming->profession->id_profession . ' - ' . $unscheduledProgramming->profession->profession_name]
                                      [$unscheduledProgramming->activity->id_activity . ' - ' . $unscheduledProgramming->activity->activity_name]['unscheduledProgramming_id'] = $unscheduledProgrammings->whereNotNull('profession_id')->where('activity_id',$unscheduledProgramming->activity_id)->toArray();
        }

        // dd($array_programacion_medica, $array_programacion_no_medica);

        $cutoffdates = CutOffDate::all();
        return view('medical_programmer.cutoffdates.index', compact('cutoffdates','array_programacion_medica', 'array_programacion_no_medica'));
        // return redirect()->route('medical_programmer.cutoffdates.index')->compact('array');
    }

    public function savePerformance(Request $request){
        $theoreticalProgramming = TheoreticalProgramming::where('id',$request->id)->first();
        $theoreticalProgramming->performance = $request->performance_value;
        $theoreticalProgramming->save();
    }
}
