<?php

namespace App\Http\Controllers\Epi;

use App\Models\Epi\SuspectCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class SuspectCaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tray)
    {
        if ($tray == 'Mi Organización') {
            // dd('soy organizacion');
            $suspectcases = SuspectCase::where('organization_id', Auth::user()->practitioners->last()->organization->id)->get();
            //dd($suspectcases);
        } else {
            $suspectcases = SuspectCase::all();
        }
        return view('epi.chagas.index', compact('suspectcases', 'tray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //traigo la última organizacion
        $organizations = Organization::where('id', Auth::user()->practitioners->last()->organization->id)->OrderBy('alias')->get();
        return view('epi.chagas.create', compact('organizations', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sc = new SuspectCase($request->All());
        $sc->save();
        session()->flash('success', 'Se creo caso sospecha exitosamente');
        return redirect()->back();
        //return redirect()->route('epi.chagas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Epi\SuspectCase  $suspectCase
     * @return \Illuminate\Http\Response
     */
    public function show(SuspectCase $suspectCase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Epi\SuspectCase  $suspectCase
     * @return \Illuminate\Http\Response
     */
    public function edit(SuspectCase $suspectCase)
    {
        //
        $organizations = Organization::OrderBy('alias')->get();
        return view('epi.chagas.edit', compact('suspectCase', 'organizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Epi\SuspectCase  $suspectCase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuspectCase $suspectCase)
    {
        //
        $suspectCase->fill($request->all());
        $suspectCase->save();

        session()->flash('success', 'Se añadieron los datos adicionales a Caso sospecha');
        return redirect()->back();
        //return redirect()->route('epi.chagas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Epi\SuspectCase  $suspectCase
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuspectCase $suspectCase)
    {
        //
    }


    



    public function delegateMail()
    {
        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
        ->orderBy('alias')
        ->get();

        return view('chagas.delegate_mail', compact('organizations'));
    }

    public function updateMail(Organization $organization, Request $request)
    {
        $organization->epi_mail = $request->epi_mail;
        $organization->save();
        return redirect()->back()->with('success', 'Correo electrónico actualizado correctamente.');
    }

    public function createChagasUser()
    {
        $permissions = Permission::where('name', 'LIKE', 'Chagas%')->get();
        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
        ->orderBy('alias')
        ->get();

        return view('epi.chagas.user_create', compact('organizations', 'permissions'));
    }

    public function indexChagasUser()
    {

        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
        ->orderBy('alias')
        ->get();

        $userTrayIds = Auth::user()->practitioners->pluck('organization_id');

        $users = User::whereHas('practitioners', function ($query) use ($userTrayIds) {
            $query->whereIn('organization_id', $userTrayIds);
        })->whereHas('permissions', function ($query) {
            $query->where('name', 'LIKE', 'Chagas%');
        })->get();

        return view('epi.chagas.user_index', compact('organizations','users'));
    }


    public function editChagasUser(User $user)
    {
        $permissions = Permission::where('name', 'LIKE', 'Chagas%')->get();
        
        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
        ->orderBy('alias')
        ->get();
        

        return view('epi.chagas.user_edit', compact('user', 'organizations', 'permissions'));
    }
}
