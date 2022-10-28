<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Models\Samu\Noveltie;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;

class NoveltieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Obtener el turno actual */
        $openShift = Shift::where('status',true)
                    ->with(['novelties','novelties.creator'])
                    ->first();

        $lastShift = Shift::latest()
                    ->skip(1)
                    ->with(['novelties','novelties.creator'])
                    ->first();

        return view ('samu.noveltie.index', compact('openShift','lastShift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.noveltie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();

        if($shift)
        {
            $noveltie = new Noveltie($request->all());
            $noveltie->shift()->associate($shift);
            $noveltie->save();

            session()->flash('success', 'La novedad fue creada.');

            return redirect()->route('samu.noveltie.index');
        }
        else
        {
            session()->flash('danger', 'No se pudo registrar la novedad,
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function edit(Noveltie $noveltie)
    {
        return view ('samu.noveltie.edit' , compact('noveltie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noveltie $noveltie)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();

        if($shift)
        {
            $noveltie->fill($request->all());
            $noveltie->save();

            session()->flash('success', 'La novedad se ha actualizado satisfactoriamente.');

            return redirect()->route('samu.noveltie.index');
        }
        else
        {
            session()->flash('danger', 'No se pudo cambiar la novedad,
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Noveltie  $noveltie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noveltie $noveltie)
    {
        //
    }
}
