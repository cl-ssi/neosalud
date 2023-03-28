<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Models\MedicalProgrammer\MotherActivity;
use App\Models\MedicalProgrammer\ActivityType;
use App\Models\MedicalProgrammer\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\MedicalProgrammer\Process;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $type = $request->get('type');

      $activities = Activity::when($type != null, function ($q) use ($type) {
                                  return $q->where('activity_type_id',$type);
                              })
                              ->orderBy('id_activity','ASC')
                              ->paginate(50);

      return view('medical_programmer.activities.index', compact('request','activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $motherActivities = MotherActivity::orderBy('description','ASC')->get();
      $activityTypes = ActivityType::orderBy('name','ASC')->get();
      $processes = Process::orderBy('name','ASC')->get();

      return view('medical_programmer.activities.create',compact('motherActivities','activityTypes','processes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $activity = new Activity($request->All());
      //$activity->user_id = Auth::id();
      $activity->save();

      session()->flash('info', 'La actividad ha sido creada.');
      return redirect()->route('medical_programmer.activities.index');
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
    public function edit(Activity $activity)
    {
      $motherActivities = MotherActivity::orderBy('description','ASC')->get();
      $activityTypes = ActivityType::orderBy('name','ASC')->get();
      $processes = Process::orderBy('name','ASC')->get();

      return view('medical_programmer.activities.edit', compact('activity','motherActivities','activityTypes','processes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->fill($request->all());
        //$activity->user_id = Auth::id();
        $activity->save();

        session()->flash('info', 'La actividad ha sido editada.');
        return redirect()->route('medical_programmer.activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
      $activity->delete();
      session()->flash('success', 'La actividad ha sido eliminada');
      return redirect()->route('medical_programmer.activities.index');
    }
}
