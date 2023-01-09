<?php

namespace App\Http\Controllers\MedicalProgrammer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Organization;
use App\Models\MedicalProgrammer\VisatorUser;

class VisatorUserController extends Controller
{
    public function index(){
        $visatorUsers = VisatorUser::all();
        $users = User::all();
        $organizations = Organization::where('service',3)->get();

      return view('medical_programmer.visator_users.index', compact('visatorUsers','users','organizations'));
    }

    public function store(Request $request){
        $visatorUser = new VisatorUser($request->All());
        $visatorUser->save();

        session()->flash('success', 'El permiso del usuario ha sido asignado.');
        return redirect()->back();
    }

    public function destroy(VisatorUser $visatorUser){
        $visatorUser->delete();

        session()->flash('success', 'El permiso del usuario ha sido eliminado.');
        return redirect()->back();
    }
}
