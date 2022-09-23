<?php

namespace App\Http\Controllers\Samu;

use App\Models\Samu\Shift;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\Shift\StoreShiftRequest;
use App\Http\Requests\Shift\UpdateShiftRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openShift = Shift::where('status',true)->exists() ?? false;
        $shifts = Shift::with('users')->latest()->paginate(10);

        return view('samu.shift.index', compact('shifts','openShift'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('samu.shift.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Shift\StoreShiftRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShiftRequest $request)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $shift = Shift::where('status', true)->first();

        if(!$shift)
        {
            $shift = new Shift($request->validated());
            $shift->save();

            session()->flash('success', 'Se ha creado el turno exitosamente');
            return redirect()->route('samu.shift.index');
        }
        else
        {
            $request->session()->flash('danger', 'No se pudo crear el turno,
                ya existe un turno abierto, verifique cerrar todos los turnos antes de crear uno nuevo.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        $openShift = Shift::where('status',true)
                        ->whereNotIn('id',[$shift->id])
                        ->exists() ? true: false;
        return view('samu.shift.edit', compact('shift','openShift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Shift\UpdateShiftRequest  $request
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $shift->fill($request->validated());
        $shift->save();

        session()->flash('info', 'El turno ha sido editado.');
        return redirect()->route('samu.shift.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Samu\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        Gate::allowIf( auth()->user()->cannot('SAMU auditor')
            ? Response::allow()
            : Response::deny('Acción no autorizada para "SAMU auditor".')
        );

        $shift->delete();
        session()->flash('danger', 'El turno ha sido eliminado satisfactoriamente.');
        return redirect()->route('samu.shift.index');
    }
}
