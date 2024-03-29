<?php

namespace App\Http\Controllers\MedicalProgrammer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\User;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\UnitHead;

class UnitHeadController extends Controller
{
    public function index(Request $request){
        // devuelve usuarios con permiso de jefe de unidad
        $units_heads = UnitHead::whereHas('user', function ($q) {
                                    return $q->permission(['Mp: perfil jefe de unidad']);
                                })->get();
        // $users = User::all();
        //solo devuelve los usuarios que pertenescan a mi organización
        $users = User::whereHas('practitioners', function ($q) {
                            return $q->whereIn('organization_id', auth()->user()->practitionersOrganizations());
                        })->get();
        
        $specialties = Specialty::all();
        $professions = Profession::all();
        return view('medical_programmer.rrhh.units_head',compact('request', 'units_heads','users','specialties','professions'));
    }

    public function store(Request $request){
        $flag = 0;
        if($request->specialty_id != null){
            $unitHead = new UnitHead();
            $unitHead->user_id = $request->user_id;
            $unitHead->specialty_id = $request->specialty_id;
            $unitHead->save();

            $user = User::find($request->user_id);
            $user->givePermissionTo('Mp: perfil jefe de unidad');
            $flag = 1;
        }

        if($request->profession_id != null){
            $unitHead = new UnitHead();
            $unitHead->user_id = $request->user_id;
            $unitHead->profession_id = $request->profession_id;
            $unitHead->save();

            $user = User::find($request->user_id);
            $user->givePermissionTo('Mp: perfil jefe de unidad');
            $flag = 1;
        }

        if($flag != 0){
            session()->flash('success', 'Se han guardado los accesos.');
        }else{
            session()->flash('warning', 'No se ha guardado información.');
        }
        
        return redirect()->back();   
    }

    public function destroy(UnitHead $units_head){
        $units_head->delete();
        // si no queda ningun usuario más, se elimina el permiso
        if(UnitHead::where('user_id',$units_head->user_id)->count() == 0){
            $units_head->user->revokePermissionTo('Mp: perfil jefe de unidad');
        }
        session()->flash('success', 'Se ha eliminado el acceso.');
        return redirect()->back();   
    }
}
