<?php

namespace App\Http\Controllers\MedicalProgrammer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\MedicalProgrammer\Process;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $processes = Process::all();
      return view('medical_programmer.process.index', compact('processes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medical_programmer.process.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $process = new Process($request->All());
      $process->save();

      session()->flash('info', 'El proceso ha sido creado.');
      return redirect()->route('medical_programmer.process.index');
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
    public function edit(Process $process)
    {
        return view('medical_programmer.process.edit', compact('process'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
      $process->fill($request->all());
      $process->save();

      session()->flash('info', 'El proceso ha sido editado.');
      return redirect()->route('medical_programmer.process.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
      $process->delete();
      session()->flash('success', 'El proceso ha sido eliminado.');
      return redirect()->route('medical_programmer.process.index');
    }
}
