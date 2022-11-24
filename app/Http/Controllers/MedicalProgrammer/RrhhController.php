<?php

namespace App\Http\Controllers\MedicalProgrammer;

// use App\Models\MedicalProgrammer\Rrhh;
use App\Models\User;
use App\Models\HumanName;
use App\Models\Identifier;
use App\Models\MedicalProgrammer\Service;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\MedicalProgrammer\Profession;
use App\Models\MedicalProgrammer\OperatingRoom;
use App\Models\MedicalProgrammer\UserSpecialty;
use App\Models\MedicalProgrammer\UserProfession;
use App\Models\MedicalProgrammer\UserAditional;
use App\Models\MedicalProgrammer\UserOperatingRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class RrhhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rut = $request->get('rut');
        $name = $request->get('name');

        // $rrhh = Rrhh::orderBy('name','ASC')->get();
        $rrhh = User::permission('Mp: user')
                ->when($rut != null, function ($q) use ($rut) {
                  return $q->whereHas('identifiers', function ($q) use ($rut) {
                    return $q->where('value', $rut)->where('cod_con_identifier_type_id', 1);
                  });
                })
                ->when($name != null, function ($query) use ($name) {
                  // return $q->whereHas('user', function ($query) use ($name) {
                      return $query->whereHas('humanNames', function ($query) use ($name) {
                          return $query->where('text', 'LIKE', '%' . $name . '%')
                                      ->orwhere('fathers_family', 'LIKE', '%' . $name . '%')
                                      ->orwhere('mothers_family', 'LKE', '%' . $name . '%');
                        });
                    // });
                  })
                  ->orderBy('id','ASC')
                  ->paginate(50);
        return view('medical_programmer.rrhh.index', compact('rrhh','request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::OrderBy('name')->get();
        // $roles = Role::OrderBy('name')->get();
        $specialties = Specialty::OrderBy('specialty_name')->get();
        $professions = Profession::OrderBy('profession_name')->get();
        $operating_rooms = OperatingRoom::OrderBy('id')->where('description','LIKE', 'Box%')->get();
        $services = Service::OrderBy('service_name')->get();
        return view('medical_programmer.rrhh.create', compact('permissions','specialties','professions','operating_rooms','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // //se crea usuario si se solicita
      // if ($request->user_create) {
      //     if (User::where('id',$request->rut)->count() == 0) {
      //         $user = new User($request->All());
      //         $user->id = $request->rut;
      //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
      //         $user->password = bcrypt($request->fathers_family);;
      //         $user->save();
      //         session()->flash('info', 'El recurso humano y el usuario han sido creados.');
      //     }else{
      //         session()->flash('info', 'El recurso humano ha sido creado. Ya existe el usuario para este RRHH.');
      //     }
      // }
      // else{
      //     session()->flash('info', 'El recurso humano ha sido creado.');
      // }
      //
      // //se crea recurso humano
      // $rrhh = new User($request->All());
      // $rrhh->save();

      DB::beginTransaction();
      try {
          $newPatient = new User($request->all());
          $newPatient->active = 1;
          $newPatient->save();
          $newHumanName = new HumanName($request->all());
          $newHumanName->use = "official";
          $newHumanName->user_id = $newPatient->id;
          $newPatient->syncPermissions('Mp: user');
          $newHumanName->save();

          $newIdentifier = new Identifier($request->all());
          $newIdentifier->user_id = $newPatient->id;
          $newIdentifier->use = "official";
          $newIdentifier->cod_con_identifier_type_id = 1;
          $newIdentifier->save();

          $userAditional = new UserAditional($request->all());
          $userAditional->user_id = $newPatient->id;
          $userAditional->save();

          $newPatient->syncPermissions(
              is_array($request->input('permissions')) ? $request->input('permissions') : array()
          );

          $newPatient->syncPermissions('Mp: user');
          $newHumanName->save();

          //asigna especialidades
          if($request->input('specialties')!=null){

              //agrega las nuevas especialidades
              foreach ($request->input('specialties') as $key => $value) {

                $userSpecialty = new UserSpecialty();
                $userSpecialty->specialty_id = $value;
                $userSpecialty->user_id = $newPatient->id;
                if ($value == $request->principal_specialty) {
                  $userSpecialty->principal = 1;
                }else{
                  $userSpecialty->principal = 0;
                }
                $userSpecialty->save();
              }
          }

          //asigna profesiones
          if($request->input('professions')!=null){

              //agrega las nuevas profesiones
              foreach ($request->input('professions') as $key => $value) {

                $userProfession = new UserProfession();
                $userProfession->profession_id = $value;
                $userProfession->user_id = $user->id;
                if ($value == $request->principal_profession) {
                  $userProfession->principal = 1;
                }else{
                  $userProfession->principal = 0;
                }
                $userProfession->save();
              }
          }

          //asigna pabellones
          if ($request->input('operating_rooms')!=null) {
              foreach ($request->input('operating_rooms') as $key => $value) {
                  $userOperatingRoom = UserOperatingRoom::where('operating_room_id',$value)
                                                  ->where('user_id', $user->id)
                                                  ->get();
                  if ($userOperatingRoom->count() == 0) {
                      $userOperatingRoom = new UserOperatingRoom();
                      $userOperatingRoom->operating_room_id = $value;
                      $userOperatingRoom->user_id = $user->id;
                      $userOperatingRoom->save();
                  }
              }
          }



          DB::commit();
          session()->flash('success', 'El usuario ha sido creado.');

      } catch (\Exception $e) {
          DB::rollBack();
          throw $e;
      }

      return redirect()->route('medical_programmer.rrhh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::where('id',$user->id)->count();
        $permissions = Permission::OrderBy('name')->get();
        // $roles = Role::OrderBy('name')->get();
        $specialties = Specialty::OrderBy('specialty_name')->get();
        $professions = Profession::OrderBy('profession_name')->get();
        $operating_rooms = OperatingRoom::OrderBy('id')->where('description','LIKE', 'Box%')->get();
        $services = Service::OrderBy('service_name')->get();
        // dd($permissions, $roles, $specialties, $professions, $operating_rooms, $services);
        return view('medical_programmer.rrhh.edit', compact('user','permissions','specialties','professions','operating_rooms', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // // //se crea usuario si se solicita
        // // if ($request->user_edited) {
        // //     if (User::where('id',$request->rut)->count() == 0) {
        // //         $user = new User($request->All());
        // //         $user->id = $request->rut;
        // //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
        // //         $user->password = bcrypt($request->fathers_family);;
        // //         $user->save();
        // //         session()->flash('info', 'El recurso humano ha sido editado y el usuario ha sido creado.');
        // //     }else{
        // //         $user = User::where('id',$request->rut)->first();
        // //         $user->fill($request->all());
        // //         $user->name = $request->name . " " . $request->fathers_family . " " . $request->mothers_family;
        // //         $user->save();
        // //         session()->flash('info', 'El recurso humano y el usuario han sido editados.');
        // //     }
        // // }else{
        // //     session()->flash('info', 'El recurso humano ha sido editado.');
        // // }
        //
        // //se crea rrhh
        // $rrhh->fill($request->all());
        // $rrhh->save();

        DB::beginTransaction();

        try {
            // $user = User::find($id);
            // $user->fill($request->all());

            // //HUMAN NAMES
            // $actualOfficialHumanName = $user->actualOfficialHumanName;
            //
            // if (
            //     $actualOfficialHumanName->text != $request->text ||
            //     $actualOfficialHumanName->fathers_family != $request->fathers_family ||
            //     $actualOfficialHumanName->mothers_family != $request->mothers_family
            // ) {
            //     $newHumanName = new HumanName($request->all());
            //     $newHumanName->use = "Official";
            //     $newHumanName->user_id = $user->id;
            //     $newHumanName->save();
            // }
            //
            // // //asigna permisos
            // // $user->syncRoles(
            // //     is_array($request->input('roles')) ? $request->input('roles') : array()
            // // );
            //
            // $user->syncPermissions(
            //     is_array($request->input('permissions')) ? $request->input('permissions') : array()
            // );

            //asigna especialidades
            if($request->input('specialties')!=null){

                //elimina lo no seleccionado
                $userSpecialties = UserSpecialty::where('user_id', $user->id)->whereNotIn('specialty_id',$request->input('specialties'))->delete();

                //agrega las nuevas especialidades
                foreach ($request->input('specialties') as $key => $value) {
                    $userSpecialty = UserSpecialty::where('specialty_id',$value)
                                                  ->where('user_id', $user->id)
                                                  ->first();

                    if ($userSpecialty == null) {
                        $userSpecialty = new UserSpecialty();
                        $userSpecialty->specialty_id = $value;
                        $userSpecialty->user_id = $user->id;
                        if ($value == $request->principal_specialty) {
                          $userSpecialty->principal = 1;
                        }else{
                          $userSpecialty->principal = 0;
                        }
                        $userSpecialty->save();
                    }else{
                      if ($value == $request->principal_specialty) {
                        // $userSpecialty->where('specialty_id',$value)->update(['principal' => 1]);
                        $userSpecialty->where('specialty_id',$value)->where('user_id', $user->id)->update(['principal' => 1]);
                      }else{
                        // $userSpecialty->where('specialty_id',$value)->update(['principal' => 0]);
                        $userSpecialty->where('specialty_id',$value)->where('user_id', $user->id)->update(['principal' => 0]);
                      }
                    }
                }
            }

            //asigna profesiones
            if($request->input('professions')!=null){

                //elimina lo no seleccionado
                $UserProfessions = UserProfession::where('user_id', $user->id)->whereNotIn('profession_id',$request->input('professions'))->delete();

                //agrega las nuevas profesiones
                foreach ($request->input('professions') as $key => $value) {
                    $userProfession = UserProfession::where('profession_id',$value)
                                                    ->where('user_id', $user->id)
                                                    ->first();
                    if ($userProfession == null) {
                        $userProfession = new UserProfession();
                        $userProfession->profession_id = $value;
                        $userProfession->user_id = $user->id;
                        if ($value == $request->principal_profession) {
                          $userProfession->principal = 1;
                        }else{
                          $userProfession->principal = 0;
                        }
                        $userProfession->save();
                    }else{
                      if ($value == $request->principal_specialty) {
                        // $userProfession->where('profession_id',$value)->update(['principal' => 1]);
                        $userProfession->where('profession_id',$value)->where('user_id', $user->id)->update(['principal' => 1]);
                      }else{
                        // $userProfession->where('profession_id',$value)->update(['principal' => 0]);
                        $userProfession->where('profession_id',$value)->where('user_id', $user->id)->update(['principal' => 0]);
                      }
                    }
                }
            }


            // //asigna pabellones
            // if($request->input('operating_rooms')!=null){
            //     foreach ($request->input('operating_rooms') as $key => $value) {
            //         $userOperatingRoom = UserOperatingRoom::where('operating_room_id',$value)
            //                                               ->where('user_id', $user->id)
            //                                              ->get();
            //         if ($userOperatingRoom->count() == 0) {
            //             $userOperatingRoom = new UserOperatingRoom();
            //             $userOperatingRoom->operating_room_id = $value;
            //             $userOperatingRoom->user_id = $user->id;
            //             $userOperatingRoom->save();
            //         }
            //     }
            // }

            $user->save();
            Db::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        session()->flash('success', 'El paciente ' . $user->officialFullName . ' ha sido actualizado.');

        return redirect()->route('medical_programmer.rrhh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharmacies\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      //se elimina la cabecera y detalles
      $user->humanNames()->delete();
      $user->identifiers()->delete();
      $user->delete();

      session()->flash('success', 'El recurso humano ha sido eliminado');
      return redirect()->route('medical_programmer.rrhh.index');
    }
}
