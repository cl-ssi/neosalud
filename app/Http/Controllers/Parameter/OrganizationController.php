<?php

namespace App\Http\Controllers\Parameter;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\OrganizationType;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($type)
    {
        if ($type == 'Laboratorios') {
            //10 es tipo laboratorio
            $organizations = Organization::where('type', 10)->paginate(50);
        } 
        else 
        {
            $organizations = Organization::OrderBy('id')->paginate(50);
        }
        return view('parameters.organizations.index', compact('organizations','type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organizationtypes = OrganizationType::OrderBy('name')->get();
        return view('parameters.organizations.create', compact('organizationtypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $establishment = new Establishment($request->All());
        $establishment->save();
        session()->flash('success', 'Se creo establecimiento exitosamente');
        return redirect()->route('parameters.establishment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        //
        $organizationtypes = OrganizationType::OrderBy('name')->get();
        return view('parameters.organizations.edit', compact('organization', 'organizationtypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        //
        $organization->fill($request->all());
        $organization->save();
        session()->flash('success', 'Organización: ' . $organization->name . ' ha sido actualizado.');

        return redirect()->route('parameter.organization.index','Todas las organizaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organization  $organization
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        //
        $organization->delete();
        session()->flash('success', 'Organización: ' . $organization->name . ' ha sido eliminado.');
        return redirect()->route('parameter.organization.index');
    }
}
