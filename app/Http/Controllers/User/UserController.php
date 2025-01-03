<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\HumanName;
use App\Models\User;
use App\Models\Identifier;
use App\Models\ContactPoint;
use Illuminate\Support\Facades\Auth;
use App\Models\Organization;
use App\Models\Practitioner;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {

        $organizations = Organization::whereIn('service', [3, 4])->orderBy('alias')->get();
        $permissions = Permission::OrderBy('name')->get();
        return view('users.create', compact('permissions', 'organizations'));
    }

    public function store(Request $request)
    {
        $repeatedIdentifier = Identifier::query()
            ->where('cod_con_identifier_type_id', 1)
            ->where('value', $request->run);
        if ($repeatedIdentifier->count() > 0) {
            session()->flash('warning', 'Este rut ya ha sido ingresado. Se ha encontrado el siguiente usuario con este rut.');
            //return view('users.index', ['run' => $request->run]);
            return redirect()->back();
        }

        $newUser = new User($request->except('organization_id[]'));

        $newUser->password = bcrypt($newUser->password);
        $newUser->active = 1;
        $newUser->claveunica = 1;

        $newUser->syncPermissions(is_array($request->input('permissions')) ? $request->input('permissions') : array());

        $newUser->save();

        $newHumanName = new HumanName($request->except('organization_id[]'));
        $newHumanName->user_id = $newUser->id;
        $newHumanName->use = 'official';
        $newHumanName->save();

        $newIdentifier = new Identifier();
        $newIdentifier->cod_con_identifier_type_id = 1;
        $newIdentifier->value = $request->run;
        $newIdentifier->dv = $request->dv;
        $newIdentifier->user_id = $newUser->id;
        $newIdentifier->use = 'official';
        $newIdentifier->save();

        $newContactPoint = new ContactPoint();
        $newContactPoint->value = $request->email;
        $newContactPoint->system = 'email';
        $newContactPoint->use = 'work';
        $newContactPoint->user_id = $newUser->id;
        $newContactPoint->save();

        $newContactPoint = new ContactPoint();
        $newContactPoint->value = $request->phone;
        $newContactPoint->system = 'phone';
        $newContactPoint->use = 'work';
        $newContactPoint->user_id = $newUser->id;
        $newContactPoint->save();

        if ($request->has('organization_id')) {
            foreach ($request->input('organization_id') as $organizationId) {
                $newPractitioner = new Practitioner();
                $newPractitioner->organization_id = $organizationId;
                $newPractitioner->user_id = $newUser->id;
                $newPractitioner->save();
            }
        }

        session()->flash('success', 'El usuario ' . $newHumanName->text . ' ha sido creado.');
        return view('users.index');
        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $organizations = Organization::whereIn('service', [3, 4])->orderBy('alias')->get();
        $permissions = Permission::OrderBy('name')->get();
        return view('users.edit', compact('user', 'permissions', 'organizations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->fill($request->except('organization_id[]'));

        $this->updatePermissions($user, is_array($request->input('permissions')) ? $request->input('permissions') : array());
        // $user->syncPermissions(is_array($request->input('permissions')) ? $request->input('permissions') : array());

        if (
            $user->actualOfficialHumanName->use != $request->human_name_use ||
            $user->actualOfficialHumanName->given != $request->given ||
            $user->actualOfficialHumanName->fathers_family != $request->fathers_family ||
            $user->actualOfficialHumanName->mothers_family != $request->mothers_family
        ) {
            $oldHumanName = HumanName::find($user->actualOfficialHumanName->id);
            $oldHumanName->period_end = now();
            $oldHumanName->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = $request->human_name_use;
            $newHumanName->user_id = $user->id;
            $newHumanName->save();
        }

        if ($user->officialEmail != $request->email) {
            $newContactPoint = new ContactPoint();
            $newContactPoint->system = 'email';
            $newContactPoint->user_id = $user->id;
            $newContactPoint->value = $request->email;
            $newContactPoint->use = 'work';
            $newContactPoint->save();
        }

        if ($user->officialPhone != $request->phone) {
            $newContactPoint = new ContactPoint();
            $newContactPoint->system = 'phone';
            $newContactPoint->user_id = $user->id;
            $newContactPoint->value = $request->phone;
            $newContactPoint->use = 'work';
            $newContactPoint->save();
        }

        // Obtener las organizaciones seleccionadas del formulario
        $selectedOrganizations = $request->input('organization_id', []);

        // Obtener las organizaciones existentes del usuario
        $existingOrganizations = $user->practitioners->pluck('organization_id')->toArray();


        // Identificar las organizaciones que se deben agregar
        $organizationsToAdd = array_diff($selectedOrganizations, $existingOrganizations);

        // Identificar las organizaciones que se deben eliminar
        $organizationsToRemove = array_diff($existingOrganizations, $selectedOrganizations);

        // Agregar nuevas organizaciones
        foreach ($organizationsToAdd as $organizationId) {
            $newPractitioner = new Practitioner();
            $newPractitioner->organization_id = $organizationId;
            $newPractitioner->user_id = $user->id;
            $newPractitioner->save();
        }

        // Eliminar organizaciones
        Practitioner::where('user_id', $user->id)->whereIn('organization_id', $organizationsToRemove)->delete();

        $user->save();

        session()->flash('success', 'El usuario ' . $user->text . ' ha sido actualizado.');

        return redirect()->back();
    }

    private function updatePermissions(User $user, array $permissions)
    {
        
        $validPermissions = Permission::whereIn('name', array_keys($permissions))
            ->pluck('name')
            ->toArray();
    
        
        $permissionsToSync = array_filter($permissions, function ($value, $key) use ($validPermissions) {
            return $value === 'true' && in_array($key, $validPermissions);
        }, ARRAY_FILTER_USE_BOTH);
    
        // Sincronizar permisos
        $user->syncPermissions(array_keys($permissionsToSync));
    }

    public function searchByName(Request $request)
    {
        $term = $request->get('term');

        $querys = HumanName::where('text', 'LIKE', '%' . $term . '%')
            ->orwhere('fathers_family', 'LIKE', '%' . $term . '%')
            ->orwhere('mothers_family', 'LIKE', '%' . $term . '%')
            ->get();

        $data = [];

        foreach ($querys as $query) {
            $data[] = [
                'label' => $query->text . " " . $query->fathers_family . " " . $query->mothers_family,
                'id' => $query->user_id
            ];
        }

        return $data;
    }

    public function switch(User $user)
    {
        if (session()->has('god')) {
            /* Clean session var */
            session()->pull('god');
        } else {
            /* set god session var = user_id */
            session(['god' => Auth::id()]);
        }

        Auth::login($user);
        return back();
    }
}
