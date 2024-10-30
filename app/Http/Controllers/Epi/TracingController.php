<?php

namespace App\Http\Controllers\Epi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Epi\Tracing;
use App\Models\Epi\SuspectCase;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TracingController extends Controller
{
    //
    public function index(Organization $organization)
    {
        $suspectcases = SuspectCase::where('organization_id', $organization->id)
            ->where(function ($query) {
                $query->where('chagas_result_confirmation', 'positivo')
                    ->orWhere('chagas_result_screening', 'Registra muestra anterior');
            })
            ->get();
        return view('chagas.tracings.index', compact('suspectcases', 'organization'));
    }

    public function create(SuspectCase $suspectcase, Organization $organization)
    {
        $cie10s = DB::select('select * from cie10 WHERE id IN (12791, 13800,12897,3559,3560,3561, 12862)');
        return view('chagas.tracings.create', compact('cie10s', 'suspectcase', 'organization'));
    }

    public function store(Request $request)
    {        
        $trace = new Tracing($request->All());
        $trace->save();
        session()->flash('info', 'El Seguimiento ha sido almacenado exitosamente');
        return redirect()->route('chagas.tracings.index', ['organization' => $request->establishment_id]);
    }

    public function edit(Tracing $tracing)
    {
        $cie10s = DB::select('select * from cie10 WHERE id IN (12791, 13800,12897,3559,3560,3561, 12862)');
        return view('chagas.tracings.edit', compact('cie10s', 'tracing'));
    }

    public function show(Tracing $tracing)
    {        
        return view('chagas.tracings.show', compact('tracing'));
    }

    public function update(Request $request, Tracing $tracing)
    {
        
        $tracing->fill($request->all());
        $tracing->save();
        session()->flash('info', 'El Seguimiento ha sido actualizado exitosamente');
        return redirect()->route('chagas.tracings.index', ['organization' => $tracing->establishment_id]);
    }


}
