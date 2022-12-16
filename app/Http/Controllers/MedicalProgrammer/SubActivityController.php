<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Http\Resources\MedicalProgrammer\SubActivityResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\MedicalProgrammer\SubActivity;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\Activity;

class SubActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $specialties = Specialty::all();
        $professions = Profession::all();

        $specialty_id = $request->get('specialty_id');
        $profession_id = $request->get('profession_id');
        $subactivities = SubActivity::when($specialty_id != 0, function ($query) use ($specialty_id) {
                                          $query->where('specialty_id', $specialty_id);
                                      })
                                      ->when($profession_id != 0, function ($query) use ($profession_id) {
                                                                        $query->where('profession_id', $profession_id);
                                                                    })
                                    ->paginate(50);

        return view('medical_programmer.subactivities.index', compact('request','subactivities','specialties','professions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $specialties = Specialty::orderBy('specialty_name','ASC')->get();
      $professions = Profession::orderBy('profession_name','ASC')->get();
      // $activities = Activity::orderBy('activity_name','ASC')->get();
      $activities = null;

      return view('medical_programmer.subactivities.create',compact('specialties','professions','activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $subactivity = new Subactivity($request->All());
      $subactivity->save();

      session()->flash('success', 'La Sub-actividad ha sido creada.');
      return redirect()->route('medical_programmer.subactivities.index');
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
    public function edit(Subactivity $subactivity)
    {
      $specialties = Specialty::orderBy('specialty_name','ASC')->get();
      $professions = Profession::orderBy('profession_name','ASC')->get();
      $activities = Activity::orderBy('activity_name','ASC')->get();
      return view('medical_programmer.subactivities.edit', compact('subactivity','specialties','professions','activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subactivity $subactivity)
    {
      $subactivity->fill($request->all());
      $subactivity->save();

      session()->flash('success', 'La subactividad ha sido editada.');
      return redirect()->route('medical_programmer.subactivities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subactivity $subactivity)
    {
        $subactivity->delete();

        session()->flash('success', 'La subactividad ha sido eliminada.');
        return redirect()->route('medical_programmer.subactivities.index');
    }

    /**
     * Retorna sub actividad para API
     * @param string $id
     * @return SubActivityResource
     */
    public function getById(string $id)
    {
        $subActivity = SubActivity::find($id);
        return new SubActivityResource($subActivity);
    }
}
