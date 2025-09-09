<?php

namespace App\Http\Controllers\Samu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Http\Requests\Call\StoreCallRequest;
use App\Http\Requests\Call\UpdateCallRequest;
use App\Models\Commune;
use App\Models\Samu\Call;
use App\Models\Samu\Event;
use App\Models\Samu\Key;
use App\Models\Samu\MobileInService;
use App\Models\Samu\Shift;
use Illuminate\Http\Request;
use App\Models\Samu\Mobile;
use App\Models\Samu\Ot;
use App\Models\Samu\ShiftUser;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $triage = [false];
        $openShift = Shift::where('status', true)
            ->with(['calls', 'calls.events', 'calls.referenceCall', 'calls.receptor', 'calls.commune'])
            ->first();
        $lastShift = Shift::latest()
            ->skip(1)
            ->with(['calls', 'calls.events', 'calls.referenceCall', 'calls.receptor', 'calls.commune'])
            ->first();

        return view('samu.call.index', compact('openShift', 'lastShift', 'triage'));
    }

    public function ots()
    {
        $openShift = Shift::where('status', true)
            ->with(['calls', 'calls.events', 'calls.receptor', 'calls.commune'])
            ->first();
        $lastShift = Shift::latest()
            ->skip(1)
            ->with(['calls', 'calls.events', 'calls.receptor', 'calls.commune'])
            ->first();

        return view('samu.call.ots', compact('openShift', 'lastShift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Obtener el turno actual */
        $shift = Shift::where('status', true)->first();
        $communes = Commune::whereHas('samu')->get(['id', 'name', 'latitude', 'longitude']);

        if (!$shift) {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        return view('samu.call.create', compact('communes', 'shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Call\StoreCallRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCallRequest $request)
    {
        Gate::allowIf(
            auth()->user()->cannot('SAMU auditor')
                ? Response::allow()
                : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        if (Shift::whereStatus(true)->exists()) {
            $dataValidated = $request->validated();
            //$dataValidated['age'] = generateAge($dataValidated['year'], $dataValidated['month']);
            Call::create($dataValidated);

            $request->session()->flash('success', 'Se ha guardado el nuevo llamado.');
            return redirect()->route('samu.call.create');
        } else {
            $request->session()->flash('danger', 'No se puede guardar el llamado,
                el turno se ha cerrado, solicite que abran un turno y luego intente guardar nuevamente.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function show(Call $call)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function edit(Call $call)
    {
        /* Obtener el turno actual */
        $shift = Shift::whereStatus(true)->first();
        $communes = Commune::whereHas('samu')->get(['id', 'name', 'latitude', 'longitude']);
        $keys = Key::orderBy('key')->get(['id', 'key', 'name']);

        if (!$shift) {
            session()->flash('danger', 'Debe abrir un turno primero');
            return redirect()->route('samu.welcome');
        }

        return view('samu.call.edit', compact('call', 'communes', 'keys', 'shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Call\UpdateCallRequest $request
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCallRequest $request, Call $call)
    {
        Gate::allowIf(
            auth()->user()->cannot('SAMU auditor')
                ? Response::allow()
                : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $dataValidated = $request->validated();
        //$dataValidated['age'] = generateAge($dataValidated['year'], $dataValidated['month']);

        if ($call->classification != $request->filled('classification')) {
            $dataValidated['regulator_id'] = auth()->id();
        }

        $call->update($dataValidated);
        $request->session()->flash('success', 'Se han actualizado los datos la orientación telefónica.');

        switch ($call->classification) {
            case 'OT':
                return redirect()->route('samu.call.ots');
                break;
            case 'T1':
            case 'T2':
            case 'NM':
                return redirect()->route('samu.call.index');
                break;
            default:
                return redirect()->route('samu.call.index');
                break;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Call  $call
     * @return \Illuminate\Http\Response
     */
    public function destroy(Call $call)
    {
        Gate::allowIf(
            auth()->user()->cannot('SAMU auditor')
                ? Response::allow()
                : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $call->delete();
        return redirect()->route('samu.call.index')->with('danger', 'Eliminado');
    }

    /**
     * Shows the locations of calls and mobiles.
     *
     * @return \Illuminate\Http\Response
     */
    public function maps()
    {
        return view('samu.maps.maps');
    }
}
