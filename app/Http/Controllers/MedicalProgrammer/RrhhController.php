<?php

namespace App\Http\Controllers\MedicalProgrammer;

// use App\Models\MedicalProgrammer\Rrhh;
use App\Models\User;
use App\Models\HumanName;
use App\Models\Identifier;
use App\Models\Practitioner;
use App\Models\MedicalProgrammer\Contract;
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
use App\Imports\SirhRrhhImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Models\Organization;
use App\Models\MedicalProgrammer\UnitHead;

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
        $organizations = Organization::all();

        return view('medical_programmer.rrhh.create', compact('permissions','specialties','professions','operating_rooms','services','organizations'));
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

        // //asigna especialidades
        // if($request->input('specialties')!=null){

        //     //agrega las nuevas especialidades
        //     foreach ($request->input('specialties') as $key => $value) {

        //     $userSpecialty = new UserSpecialty();
        //     $userSpecialty->specialty_id = $value;
        //     $userSpecialty->user_id = $newPatient->id;
        //     if ($value == $request->principal_specialty) {
        //         $userSpecialty->principal = 1;
        //     }else{
        //         $userSpecialty->principal = 0;
        //     }
        //     $userSpecialty->save();
        //     }
        // }

          //asigna profesiones
        //   if($request->input('professions')!=null){

        //       //agrega las nuevas profesiones
        //       foreach ($request->input('professions') as $key => $value) {

        //         $userProfession = new UserProfession();
        //         $userProfession->profession_id = $value;
        //         $userProfession->user_id = $user->id;
        //         if ($value == $request->principal_profession) {
        //           $userProfession->principal = 1;
        //         }else{
        //           $userProfession->principal = 0;
        //         }
        //         $userProfession->save();
        //       }
        //   }

        //   //asigna pabellones
        //   if ($request->input('operating_rooms')!=null) {
        //       foreach ($request->input('operating_rooms') as $key => $value) {
        //           $userOperatingRoom = UserOperatingRoom::where('operating_room_id',$value)
        //                                           ->where('user_id', $user->id)
        //                                           ->get();
        //           if ($userOperatingRoom->count() == 0) {
        //               $userOperatingRoom = new UserOperatingRoom();
        //               $userOperatingRoom->operating_room_id = $value;
        //               $userOperatingRoom->user_id = $user->id;
        //               $userOperatingRoom->save();
        //           }
        //       }
        //   }

        if ($request->has('organization_id')) {
            foreach ($request->organization_id as $key => $organization_id) {
                if ($organization_id != null) {
                    $newPractitioner = new Practitioner();
                    $newPractitioner->active = 1;
                    $newPractitioner->user_id = $newPatient->id;
                    $newPractitioner->organization_id = $request->organization_id[$key];
                    $newPractitioner->profession_id = $request->profession_id[$key];
                    $newPractitioner->specialty_id = $request->specialty_id[$key];
                    $newPractitioner->save();
                }

                if($request->specialty_id[$key] != null){
                    $userSpecialty = new UserSpecialty();
                    $userSpecialty->specialty_id = $request->specialty_id[$key];
                    $userSpecialty->user_id = $newPatient->id;
                    // if ($key == 0) {$userSpecialty->principal = 1;}
                    // else{$userSpecialty->principal = 0;}
                    $userSpecialty->principal = 0;
                    $userSpecialty->save();
                }

                if($request->profession_id[$key] != null){
                    $userProfession = new UserProfession();
                    $userProfession->profession_id = $request->profession_id[$key];
                    $userProfession->user_id = $newPatient->id;
                    // if ($key == 0) {$userProfession->principal = 1;}
                    // else{$userProfession->principal = 0;}
                    $userProfession->principal = 0;
                    $userProfession->save();
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
        $organizations = Organization::all();
        $patient = $user;

        // dd($permissions, $roles, $specialties, $professions, $operating_rooms, $services);
        return view('medical_programmer.rrhh.edit', compact('user','permissions','specialties','professions','operating_rooms', 'services',
                                                'organizations','patient'));
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

            // //asigna especialidades
            // if($request->input('specialties')!=null){

            //     //elimina lo no seleccionado
            //     $userSpecialties = UserSpecialty::where('user_id', $user->id)->whereNotIn('specialty_id',$request->input('specialties'))->delete();

            //     //agrega las nuevas especialidades
            //     foreach ($request->input('specialties') as $key => $value) {
            //         $userSpecialty = UserSpecialty::where('specialty_id',$value)
            //                                       ->where('user_id', $user->id)
            //                                       ->first();

            //         if ($userSpecialty == null) {
            //             $userSpecialty = new UserSpecialty();
            //             $userSpecialty->specialty_id = $value;
            //             $userSpecialty->user_id = $user->id;
            //             if ($value == $request->principal_specialty) {
            //               $userSpecialty->principal = 1;
            //             }else{
            //               $userSpecialty->principal = 0;
            //             }
            //             $userSpecialty->save();
            //         }else{
            //           if ($value == $request->principal_specialty) {
            //             // $userSpecialty->where('specialty_id',$value)->update(['principal' => 1]);
            //             $userSpecialty->where('specialty_id',$value)->where('user_id', $user->id)->update(['principal' => 1]);
            //           }else{
            //             // $userSpecialty->where('specialty_id',$value)->update(['principal' => 0]);
            //             $userSpecialty->where('specialty_id',$value)->where('user_id', $user->id)->update(['principal' => 0]);
            //           }
            //         }
            //     }
            // }

            // //asigna profesiones
            // if($request->input('professions')!=null){

            //     //elimina lo no seleccionado
            //     $UserProfessions = UserProfession::where('user_id', $user->id)->whereNotIn('profession_id',$request->input('professions'))->delete();

            //     //agrega las nuevas profesiones
            //     foreach ($request->input('professions') as $key => $value) {
            //         $userProfession = UserProfession::where('profession_id',$value)
            //                                         ->where('user_id', $user->id)
            //                                         ->first();
            //         if ($userProfession == null) {
            //             $userProfession = new UserProfession();
            //             $userProfession->profession_id = $value;
            //             $userProfession->user_id = $user->id;
            //             if ($value == $request->principal_profession) {
            //               $userProfession->principal = 1;
            //             }else{
            //               $userProfession->principal = 0;
            //             }
            //             $userProfession->save();
            //         }else{
            //           if ($value == $request->principal_specialty) {
            //             // $userProfession->where('profession_id',$value)->update(['principal' => 1]);
            //             $userProfession->where('profession_id',$value)->where('user_id', $user->id)->update(['principal' => 1]);
            //           }else{
            //             // $userProfession->where('profession_id',$value)->update(['principal' => 0]);
            //             $userProfession->where('profession_id',$value)->where('user_id', $user->id)->update(['principal' => 0]);
            //           }
            //         }
            //     }
            // }

            //PRACTITIONER
            $patient =  $user;
            $storedPractitionerIds = $patient->practitioners->pluck('id')->toArray();
            if ($request->has('organization_id')) {
                //forearch para actualizar/agregar practitioners
                foreach ($request->organization_id as $key => $organization_id) {
                    if ($request->practitioner_id[$key] == null) {
                        $newPractitioner = new Practitioner();
                        $newPractitioner->active = 1;
                        $newPractitioner->user_id = $patient->id;
                        $newPractitioner->organization_id = $request->organization_id[$key];
                        $newPractitioner->specialty_id = $request->specialty_id[$key];
                        $newPractitioner->profession_id = $request->profession_id[$key];
                        $newPractitioner->save(); 

                        if($request->specialty_id[$key] != null){
                            $userSpecialty = new UserSpecialty();
                            $userSpecialty->specialty_id = $request->specialty_id[$key];
                            $userSpecialty->user_id = $patient->id;
                            $userSpecialty->principal = 0;
                            $userSpecialty->save();
                        }
        
                        if($request->profession_id[$key] != null){
                            $userProfession = new UserProfession();
                            $userProfession->profession_id = $request->profession_id[$key];
                            $userProfession->user_id = $patient->id;
                            $userProfession->principal = 0;
                            $userProfession->save();
                        }

                    } elseif (in_array($request->practitioner_id[$key], $storedPractitionerIds)) {
                        $practitioner = Practitioner::find($request->practitioner_id[$key]);
                        $last_specialty_id = $practitioner->specialty_id;
                        $last_profession_id = $practitioner->profession_id;
                        $practitioner->active = 1;
                        $practitioner->user_id = $patient->id;
                        $practitioner->organization_id = $request->organization_id[$key];
                        $practitioner->specialty_id = $request->specialty_id[$key];
                        $practitioner->profession_id = $request->profession_id[$key];
                        $practitioner->save();

                        if($request->specialty_id[$key] != null){
                            $userSpecialty = UserSpecialty::where('specialty_id',$last_specialty_id)
                                                        ->where('user_id',$patient->id)
                                                        ->update(['specialty_id'=>$request->specialty_id[$key]]);
                        }
        
                        if($request->profession_id[$key] != null){
                            $userProfession = UserProfession::where('profession_id',$last_profession_id)
                                                            ->where('user_id',$patient->id)
                                                            ->update(['profession_id'=>$request->profession_id[$key]]);
                        }
                    }
                }
                //foreach para eliminar practitioners
                foreach ($storedPractitionerIds as $key => $storedPractitionerId) {
                    if (!in_array($storedPractitionerId, $request->practitioner_id)) {
                        $practitioner = Practitioner::find($storedPractitionerId);
                        $last_specialty_id = $practitioner->specialty_id;
                        $last_profession_id = $practitioner->profession_id;
                        $practitioner->delete();

                        $userSpecialty = UserSpecialty::where('specialty_id',$last_specialty_id)
                                                        ->where('user_id',$patient->id)
                                                        ->delete();

                        $userProfession = UserProfession::where('profession_id',$last_profession_id)
                                                            ->where('user_id',$patient->id)
                                                            ->delete();
                    }
                }
            }
            else {
                //Si no hay ninguno, elimina todo
                foreach ($storedPractitionerIds as $key => $storedPractitionerId) {
                        $practitioner = Practitioner::find($storedPractitionerId);
                        $last_specialty_id = $practitioner->specialty_id;
                        $last_profession_id = $practitioner->profession_id;
                        $practitioner->delete();

                        $userSpecialty = UserSpecialty::where('specialty_id',$last_specialty_id)
                                                        ->where('user_id',$patient->id)
                                                        ->delete();

                        $userProfession = UserProfession::where('profession_id',$last_profession_id)
                                                            ->where('user_id',$patient->id)
                                                            ->delete();
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

    public function importSirhFile(Request $request){
        $request->validate(['file' => 'required'], [ 'file.required' => 'Archivo es requerido.']);
        $file = request()->file('file');
        $collection = Excel::toCollection(new SirhRrhhImport, $file);
        $user_count = 0;
        $contract_count = 0;
        foreach($collection as $row){
            foreach($row as $key => $column){ 
                
                // dd($column);
                if(array_key_exists('rut_tit', $column->toArray()))
                {
                    if($column['rut_tit']!=null)
                    {

                        //********** INFO RRHH  ***********/

                        //si no existe usuario, se crea.
                        if(!User::getUserByRun($column['rut_tit']))
                        {
                            if (array_key_exists(3,explode(" ", $column['nombre']))) 
                            {
                                $newPatient = new User();
                                $newPatient->given = explode(" ", $column['nombre'])[2] . " " . explode(" ", $column['nombre'])[3];
                                $newPatient->fathers_family = explode(" ", $column['nombre'])[0];
                                $newPatient->mothers_family = explode(" ", $column['nombre'])[1];
                                $newPatient->active = 1;
                                $newPatient->save();

                                $newHumanName = new HumanName();
                                $newHumanName->use = "official";
                                $newHumanName->given = explode(" ", $column['nombre'])[2] . " " . explode(" ", $column['nombre'])[3];
                                $newHumanName->fathers_family = explode(" ", $column['nombre'])[0];
                                $newHumanName->mothers_family = explode(" ", $column['nombre'])[1];
                                $newHumanName->period_start = Carbon::now();;
                                $newHumanName->user_id = $newPatient->id;
                                $newPatient->syncPermissions('Mp: user');
                                $newHumanName->save();

                            }else{
                                $newPatient = new User();
                                $newPatient->given = explode(" ", $column['nombre'])[2];
                                $newPatient->fathers_family = explode(" ", $column['nombre'])[0];
                                $newPatient->mothers_family = explode(" ", $column['nombre'])[1];
                                $newPatient->active = 1;
                                $newPatient->save();

                                $newHumanName = new HumanName();
                                $newHumanName->use = "official";
                                $newHumanName->given = explode(" ", $column['nombre'])[2];
                                $newHumanName->fathers_family = explode(" ", $column['nombre'])[0];
                                $newHumanName->mothers_family = explode(" ", $column['nombre'])[1];
                                $newHumanName->period_start = Carbon::now();;
                                $newHumanName->user_id = $newPatient->id;
                                $newPatient->syncPermissions('Mp: user');
                                $newHumanName->save();
                            }
                
                            $newIdentifier = new Identifier();
                            $newIdentifier->value = $column['rut_tit'];
                            $newIdentifier->dv = $column['dv'];
                            $newIdentifier->user_id = $newPatient->id;
                            $newIdentifier->use = "official";
                            $newIdentifier->cod_con_identifier_type_id = 1;
                            $newIdentifier->save();

                            $userAditional = new UserAditional($request->all());
                            switch ($column['ausentismo_sino']) {
                                case "Si":
                                    $userAditional->risk_group = 1;
                                    break;
                                case "No":
                                    $userAditional->risk_group = 0;
                                    break;
                            }
                            // $userAditional->missing_condition = 
                            $userAditional->missing_reason = $column['motivo_maternales_psgs_comisiones_de_estudio'];
                            $userAditional->job_title = $column['titulo_profesional_desempeno'];
                            $userAditional->sis_specialty = $column['especialidad_sis'];
                            $userAditional->user_id = $newPatient->id;
                            $userAditional->save();

                            $user_count = $user_count + 1;
                        }

                        /********** INFO CONTRATOS ********/

                        //formatea excel date to carbon date
                        $UNIX_DATE = ($column['fecha_inicio_contrato_ddmmaaaa'] - 25569) * 86400;
                        $fecha_inicio_contrato_ddmmaaaa = Carbon::parse(gmdate("d-m-Y H:i:s", $UNIX_DATE));

                        $UNIX_DATE = ($column['fecha_termino_contrato_ddmmaaaa'] - 25569) * 86400;
                        $fecha_termino_contrato_ddmmaaaa = Carbon::parse(gmdate("d-m-Y H:i:s", $UNIX_DATE));

                        $UNIX_DATE = ($column['fecha_alejamiento_ddmmaaaa'] - 25569) * 86400;
                        $fecha_alejamiento_ddmmaaaa = Carbon::parse(gmdate("d-m-Y H:i:s", $UNIX_DATE));

                        $user = User::getUserByRun($column['rut_tit']);
                        //se debe modificar esto, puede haber más de un contrato en el año,
                        //si existe un contrato para una persona en el mismo periodo (inicio a termino), se modifica. ¿?
                        //si no, se crea uno nuevo.
                        $contract = Contract::where('user_id',$user->id)
                                            // ->where('year',$fecha_inicio_contrato_ddmmaaaa->format('Y'))
                                            ->where('contract_start_date',$fecha_inicio_contrato_ddmmaaaa)
                                            ->where('contract_end_date',$fecha_termino_contrato_ddmmaaaa)
                                            ->get();

                        $establishment_id = Organization::where('code_deis',$column['id_deis'])->first()->id;

                        //si no encuentra contrato, lo crea.
                        if($contract->count() == 0){
                            $contract = new Contract();
                            $contract->user_id = $user->id;
                            $contract->establishment_id = $establishment_id;
                            $contract->year = $fecha_inicio_contrato_ddmmaaaa->format('Y');
                            switch ($column['ley']) {
                                case 19664:
                                    $contract->law = 'LEY 19.664';
                                    break;
                                case 18834:
                                    $contract->law = 'LEY 18.834';
                                    break;
                                case 15076:
                                    $contract->law = 'LEY 15.076';
                                    break;
                                case 'Honorarios':
                                    $contract->law = 'HSA';
                            }
                            $contract->contract_id = $column['correlativo_contrato'];
                            switch ($column['sistema_de_turno_sino']) {
                                case 'No':
                                    $contract->shift_system = 'N';
                                    break;
                                case 'Si':
                                    $contract->shift_system = 'S';
                                    break;
                            }
                            // $contract->shift_system = $column['sistema_de_turno_sino'];
                            $contract->weekly_hours = $column['hrs_semanales_contratadas'];
                            $contract->effective_hours = $column['horas_efectivas_al_centro'];
                            $contract->weekly_collation = $column['tiempo_de_colacion_semanal_min'];
                            $contract->weekly_union_permit = $column['tiempo_de_permiso_gremial_semanal_min'];
                            $contract->breastfeeding_time = $column['tiempo_de_lactancia_semanal_min'];
                            $contract->obs = $column['observaciones_debe_identificar_liberado_de_guardia_lgperiodo_asistencial_obligatoriopaobecario_beca'];
                            $contract->legal_holidays = $column['feriados_legales'][0];
                            $contract->compensatory_rest = $column['dias_descanso_compensatorio_ley_urgencia'][0];
                            $contract->administrative_permit = $column['dias_de_permisos_administrativos'][0];
                            $contract->covid_permit = $column['descanso_reparatorio_covid'][0];
                            $contract->training_days = $column['dias_de_congreso_o_capacitacion'][0];
                            // $contract->covid_permit = $column['rut_tit'];
                            $contract->contract_start_date = $fecha_inicio_contrato_ddmmaaaa;
                            $contract->contract_end_date = $fecha_termino_contrato_ddmmaaaa;
                            $contract->departure_date = $fecha_alejamiento_ddmmaaaa;
                            $contract->service_id = 50; //sin servicio
                            $contract->save();

                            $contract_count = $contract_count + 1;
                        }
                    }
                }
            }
            
        }

        session()->flash('success', 'Se ha cargado correctamente el archivo (Se han creado ' . $user_count . ' usuarios y ' . $contract_count . ' contratos).');
        return redirect()->back();
    }

    public function assign_your_team(){
        

        // si admin, devuelve todos
        if(Auth::user()->hasPermissionTo('Mp: administrador')){
            $specialty_users = Practitioner::whereHas('user')->whereNotNull('specialty_id')->get();
            $profession_users = Practitioner::whereHas('user')->whereNotNull('profession_id')->get();

            $specialties = Specialty::OrderBy('specialty_name')->get();
            $professions = Profession::OrderBy('profession_name')->get();
        }
        else{
            $unitHeads_specialty = UnitHead::where('user_id',Auth::id())->pluck('specialty_id');
            $unitHeads_profession = UnitHead::where('user_id',Auth::id())->pluck('profession_id');

            // si no, devuelve segun asignación "asigna tu equipo"
            $specialty_users = Practitioner::whereIn('specialty_id',$unitHeads_specialty)
                                            ->whereHas('user')
                                            ->get();

            $profession_users = Practitioner::whereIn('profession_id',$unitHeads_profession)
                                            ->whereHas('user')
                                            ->get();

            $specialties = Specialty::whereIn('id',$unitHeads_specialty)->OrderBy('specialty_name')->get();
            $professions = Profession::whereIn('id',$unitHeads_profession)->OrderBy('profession_name')->get();
        }
        
        $organizations = Organization::all();
        $users = User::permission('Mp: user')->get();
        // dd($users);

        return view('medical_programmer.rrhh.assign_your_team',compact('specialty_users','profession_users','specialties',
                                                                        'professions','organizations','users'));
    }

    public function store_assign_your_team(Request $request){
        $user = User::find($request->user_id);

        if ($request->has('organization_id')) {
            foreach ($request->organization_id as $key => $organization_id) {
                if ($organization_id != null) {
                    $newPractitioner = new Practitioner();
                    $newPractitioner->active = 1;
                    $newPractitioner->user_id = $user->id;
                    $newPractitioner->organization_id = $request->organization_id[$key];
                    $newPractitioner->profession_id = $request->profession_id[$key];
                    $newPractitioner->specialty_id = $request->specialty_id[$key];
                    $newPractitioner->save();
                }

                if($request->specialty_id[$key] != null){
                    $userSpecialty = new UserSpecialty();
                    $userSpecialty->specialty_id = $request->specialty_id[$key];
                    $userSpecialty->user_id = $user->id;
                    $userSpecialty->principal = 0;
                    $userSpecialty->save();
                }

                if($request->profession_id[$key] != null){
                    $userProfession = new UserProfession();
                    $userProfession->profession_id = $request->profession_id[$key];
                    $userProfession->user_id = $user->id;
                    $userProfession->principal = 0;
                    $userProfession->save();
                }
            }
        }

        session()->flash('success', 'Se ha agregado el usuario a tu equipo.');
        return redirect()->back();
    }

    public function destroy_assign_your_team(Practitioner $practitioner){
        if($practitioner->specialty_id){
            $specialty = UserSpecialty::where('user_id',$practitioner->user_id)
                                    ->where('specialty_id',$practitioner->specialty_id)
                                    ->delete();
        }

        if($practitioner->profession_id){
            $specialty = UserProfession::where('user_id',$practitioner->user_id)
                                    ->where('profession_id',$practitioner->profession_id)
                                    ->delete();
        }

        $practitioner->delete();

        session()->flash('success', 'Se ha eliminado el usuario de tu equipo.');
        return redirect()->back();
    }

    public function visators(){
        // Mp: Proposal - Jefe de Servicio (no debería ir)
        $users = User::all();
        $users_jefe_cae_médico = User::permission(['Mp: Proposal - Jefe de CAE Médico'])->get();
        $users_jefe_cae_no_medico = User::permission(['Mp: Proposal - Jefe de CAE No médico'])->get();
        $users_subdireccion_medica = User::permission(['Mp: Proposal - Subdirección Médica'])->get();
        $users_subdireccion_dgcp = User::permission(['Mp: Proposal - Subdirección DGCP'])->get();

        return view('medical_programmer.rrhh.visators',compact('users','users_jefe_cae_médico','users_subdireccion_medica',
                                                                'users_jefe_cae_no_medico','users_subdireccion_dgcp'));
    }

    public function add_visator(Request $request){

        $user = User::find($request->user_id);
        if ($user->hasAnyPermission(['Mp: Proposal - Jefe de CAE Médico','Mp: Proposal - Jefe de CAE No médico','Mp: Proposal - Subdirección Médica','Mp: Proposal - Subdirección DGCP'])) {
            session()->flash('warning', 'El usuario ya tiene un permiso asignado.');
        }else{
            $user->givePermissionTo($request->permission);
            session()->flash('success', 'Se ha guardado el permiso del usuario.');
        }
        
        return redirect()->back();
    }

    public function destroy_visator(User $user, $permission){
        $user->revokePermissionTo($permission);
        session()->flash('success', 'Se ha eliminado el permiso del usuario.');
        return redirect()->back();
    }
}
