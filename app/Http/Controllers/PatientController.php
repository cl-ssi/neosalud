<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\Address;
use App\Models\CodConIdentifierType;
use App\Models\CodConMarital;
use App\Models\Commune;
use App\Models\CongregationUser;
use App\Models\ContactPoint;
use App\Models\Country;
use App\Models\Congregation;
use App\Models\Gender;
use App\Models\HumanName;
use App\Models\Identifier;
use App\Models\MedicalProgrammer\Specialty;
use App\Models\Organization;
use App\Models\MedicalProgrammer\Profession;
use App\Models\Practitioner;
use App\Models\Region;
use App\Models\Sex;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Traits\GoogleToken;
use App\Models\Some\Sic;
use Session;
use Throwable;

class PatientController extends Controller
{
    use GoogleToken;

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('patients.index');
    }

    public function create($interconsultationId = null)
    {
        if (request()->session()->has('request_match')) request()->session()->forget('request_match');
        $permissions = Permission::OrderBy('name')->get();
        $maritalStatus = CodConMarital::all();
        $countries = Country::all();
        $regions = Region::all();
        $congregations = Congregation::all();
        $identifierTypes = CodConIdentifierType::all();
        $organizations = Organization::all();
        $professions = Profession::all();
        $specialties = Specialty::all();
        $sexes = Sex::all();
        $genders = Gender::all();

        $sic = null;
        if ($interconsultationId) {
            $sic = Sic::find($interconsultationId);
        }

        return view('patients.create', compact(
                'permissions', 'maritalStatus', 'countries', 'regions', 'identifierTypes',
                'congregations', 'professions', 'organizations', 'specialties', 'sic', 'sexes', 'genders')
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        if ($request->has('id_type')) {
            foreach ($request->id_type as $key => $id_type) {
                $repeated = Identifier::query()
                    ->where('use', $request->id_use[$key])
                    ->where('cod_con_identifier_type_id', $request->id_type[$key])
                    ->where('value', $request->id_value[$key]);
                if ($repeated->count() > 0) {
                    session()->flash('warning', 'Se ha ingresando un identificador repetido.');
                    return redirect()->back()->withInput();
                }
            }
        }

        if($request->session()->has('request_match')){
            $this->savePatientData(new Request($request->session()->get('request_match')));
            $request->session()->forget('request_match');
        }else{
            $matchingPatients = $this->getMatchingPatients($request);
            if ($matchingPatients->count() === 0) {
                $this->savePatientData($request);
            } else {
                $request->session()->put('request_match', $request->all());
                return view('patients.matching_patients', compact('matchingPatients'));
            }
        }

        return redirect()->route('patient.index')->with('success', 'Se ha registrado al paciente satisfactoriamente');
    }

    public function savePatientData(Request $request)
    {
        DB::beginTransaction();
        try {
            $newPatient = new User($request->all());
            $newPatient->active = 1;
            $newPatient->save();
            $newHumanName = new HumanName($request->all());
            $newHumanName->use = $request->human_name_use;
            $newHumanName->user_id = $newPatient->id;
            $newHumanName->save();

            $newPatient->sexes()->attach($request->sex, ['valid_from' => now()]);
            $newPatient->genders()->attach($request->gender, ['valid_from' => now()]);

            $newPatient->syncPermissions(
                is_array($request->input('permissions')) ? $request->input('permissions') : array()
            );

            if ($request->has('id_type')) {
                foreach ($request->id_type as $key => $id_type) {
                    $newIdentifier = new Identifier();
                    $newIdentifier->user_id = $newPatient->id;
                    $newIdentifier->use = $request->id_use[$key];
                    $newIdentifier->cod_con_identifier_type_id = $request->id_type[$key];
                    $newIdentifier->value = $request->id_value[$key];
                    $newIdentifier->dv = $request->id_dv[$key];
                    $newIdentifier->save();
                }
            }

            if ($request->has('address_use')) {
                foreach ($request->address_use as $key => $address_use) {
                    $newAddress = new Address();
                    $newAddress->user_id = $newPatient->id;
                    $newAddress->use = $request->address_use[$key];
                    $newAddress->type = 'physical';
                    $newAddress->text = $request->street_name[$key];
                    $newAddress->line = $request->line[$key];
                    $newAddress->apartment = $request->address_apartment[$key];
                    $newAddress->suburb = $request->suburb[$key];
                    $newAddress->city = $request->city[$key];
                    $newAddress->commune_id = $request->district[$key];
                    $newAddress->region_id = $request->state[$key];
                    $newAddress->country_id = $request->country[$key];
                    $newAddress->actually = ((isset($request->actually[$key]) && $request->actually[$key] == 1) ? 1 : 2);
                    $newAddress->save();
                }
            }

            if ($request->has('contact_system')) {
                foreach ($request->contact_system as $key => $contact_system) {
                    $newContactPoint = new ContactPoint();
                    $newContactPoint->system = $request->contact_system[$key];
                    $newContactPoint->user_id = $newPatient->id;
                    $newContactPoint->value = $request->contact_value[$key];
                    $newContactPoint->use = $request->contact_use[$key];
                    $newContactPoint->actually = ((isset($request->contact_actually[$key]) && $request->contact_actually[$key] == 1) ? 1 : 2);
                    $newContactPoint->save();
                }
            }
            //&& $request->organization_id[$key] != null
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
                }
            }

            if ($request->has('congregation_id')) {
                foreach ($request->congregation_id as $key => $congregation_id) {
                    $newCongregationUser = new CongregationUser();
                    $newCongregationUser->user_id = $newPatient->id;
                    $newCongregationUser->congregation_id = $congregation_id;

                    if ($congregation_id == 10) {
                        $newCongregationUser->other = $request->congregation_other;
                    }

                    $newCongregationUser->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getMatchingPatients(Request $request)
    {
        $patientsByIdentifiers = User::query();
        foreach ($request->id_type as $key => $id_type) {
            $patientsByIdentifiers->getByIdentifier(
                $request->id_value[$key],
                $id_type
            );
        }

        $patientsByHumanNames = User::query();
        $patientsByHumanNames->getByHumanName(
            $request->text,
            $request->fathers_family,
            $request->mothers_family
        );

        $patientsByAddress = User::query();
        foreach ($request->address_use as $key => $address_use) {
            $patientsByAddress->getByAddress(
                $request->street_name[$key],
                $request->line[$key],
                $request->address_apartment,
                $request->country,
                $request->district,
                $request->state
            );
        }

        $patientsByContactPoint = User::query();
        foreach ($request->contact_system as $key => $contact_system) {
            $patientsByContactPoint->getByContactPoint($request->contact_value[$key]);
        }

        $allPatients = $patientsByIdentifiers->get()
            ->merge($patientsByAddress->get())
            ->merge($patientsByHumanNames->get())
            ->merge($patientsByContactPoint->get());

        return $allPatients;
    }

    public function show($id)
    {
        $patient = User::find($id);
        return view('patients.show', compact('patient'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $permissions = Permission::OrderBy('name')->get();
        $patient = User::find($id);
        $maritalStatus = CodConMarital::all();
        $countries = Country::all();
        $communes = Commune::all();
        $regions = Region::all();
        $congregations = Congregation::all();
        $identifierTypes = CodConIdentifierType::all();
        $organizations = Organization::all();
        $professions = Profession::all();
        $specialties = Specialty::all();
        $patientCongregationIds = $patient->congregations->pluck('id')->toArray();
        $congregationOther = ($patient->congregationUsers()->where('congregation_id', 10)->first()) ? $patient->congregationUsers()->where('congregation_id', 10)->first()->other : '';
        $sexes = Sex::all();
        $genders = Gender::all();

        return view('patients.edit', compact(
                'permissions', 'patient', 'countries', 'communes', 'regions', 'maritalStatus',
                'identifierTypes', 'congregations', 'organizations', 'professions', 'specialties', 'patientCongregationIds',
                'congregationOther', 'sexes', 'genders'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|Factory|View
     * @throws Throwable
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $patient = User::find($id);
            $patient->fill($request->all());

            $this->updateSex($patient, $request);
            $this->updateGender($patient, $request);

            $patient->syncPermissions(
                is_array($request->input('permissions')) ? $request->input('permissions') : array()
            );

            //HUMAN NAMES
            $actualOfficialHumanName = $patient->actualOfficialHumanName;

            if (
                $actualOfficialHumanName->use != $request->human_name_use ||
                $actualOfficialHumanName->given != $request->given ||
                $actualOfficialHumanName->fathers_family != $request->fathers_family ||
                $actualOfficialHumanName->mothers_family != $request->mothers_family

            ) {
                $actualOfficialHumanName->period_end = now();
                $actualOfficialHumanName->save();
                $newHumanName = new HumanName($request->all());
                $newHumanName->use = $request->human_name_use;
                $newHumanName->user_id = $patient->id;
                $newHumanName->save();
            }

            //USER ID
            $storedUserIds = $patient->identifiers->pluck('id')->toArray();
            if ($request->has('id_type')) {
                //foreach para actualizar/agregar identifiers
                foreach ($request->id_type as $key => $id_type) {
                    if ($request->identifier_id[$key] == null) {
                        $newIdentifier = new Identifier();
                        $newIdentifier->user_id = $patient->id;
                        $newIdentifier->use = $request->id_use[$key];
                        $newIdentifier->cod_con_identifier_type_id = $request->id_type[$key];
                        $newIdentifier->value = $request->id_value[$key];
                        $newIdentifier->dv = $request->id_dv[$key];
                        $newIdentifier->save();
                    } elseif (in_array($request->identifier_id[$key], $storedUserIds)) {
                        $identifier = Identifier::find($request->identifier_id[$key]);
                        $identifier->user_id = $patient->id;
                        $identifier->use = $request->id_use[$key];
                        $identifier->cod_con_identifier_type_id = $request->id_type[$key];
                        $identifier->value = $request->id_value[$key];
                        $identifier->dv = $request->id_dv[$key];
                        $identifier->save();
                    }
                }
                //foreach para eliminar identificadores
                foreach ($storedUserIds as $key => $storedUserId) {
                    if (!in_array($storedUserId, $request->identifier_id)) {
                        $identifier = Identifier::find($storedUserId);
                        $identifier->delete();
                    }
                }
            }

            //ADDRESSES
            $storedAddressIds = $patient->addresses->pluck('id')->toArray();
            if ($request->has('address_use')) {
                //forearch para actualizar/agregar direcciones
                foreach ($request->address_use as $key => $address_use) {
                    if ($request->address_id[$key] == null) {
                        $newAddress = new Address();
                        $newAddress->user_id = $patient->id;
                        $newAddress->use = $request->address_use[$key];
                        $newAddress->type = 'physical';
                        $newAddress->text = $request->street_name[$key];
                        $newAddress->line = $request->line[$key];
                        $newAddress->apartment = $request->address_apartment[$key];
                        $newAddress->suburb = $request->suburb[$key];
                        $newAddress->city = $request->city[$key];
                        $newAddress->commune_id = $request->district[$key];
                        $newAddress->region_id = $request->state[$key];
                        $newAddress->country_id = $request->country[$key];
                        $newAddress->save();
                    } elseif (in_array($request->address_id[$key], $storedAddressIds)) {
                        $address = Address::find($request->address_id[$key]);
                        $address->user_id = $patient->id;
                        $address->use = $request->address_use[$key];
                        $address->type = 'physical';
                        $address->text = $request->street_name[$key];
                        $address->line = $request->line[$key];
                        $address->apartment = $request->address_apartment[$key];
                        $address->suburb = $request->suburb[$key];
                        $address->city = $request->city[$key];
                        $address->commune_id = $request->district[$key];
                        $address->region_id = $request->state[$key];
                        $address->country_id = $request->country[$key];
                        $address->save();
                    }
                }

                //foreach para eliminar direcciones
                foreach ($storedAddressIds as $key => $storedAddressId) {
                    if (!in_array($storedAddressId, $request->address_id)) {
                        $address = Address::find($storedAddressId);
                        $address->delete();
                    }
                }
            }

            //CONTACT
            $storedContactIds = $patient->contactPoints->pluck('id')->toArray();
            if ($request->has('contact_system')) {
                //forearch para actualizar/agregar contactos
                foreach ($request->contact_system as $key => $contact_system) {
                    if ($request->contact_point_id[$key] == null) {
                        $newContactPoint = new ContactPoint();
                        $newContactPoint->system = $request->contact_system[$key];
                        $newContactPoint->user_id = $patient->id;
                        $newContactPoint->value = $request->contact_value[$key];
                        $newContactPoint->use = $request->contact_use[$key];
                        $newContactPoint->save();
                    } elseif (in_array($request->contact_point_id[$key], $storedContactIds)) {
                        $contactPoint = ContactPoint::find($request->contact_point_id[$key]);
                        $contactPoint->system = $request->contact_system[$key];
                        $contactPoint->user_id = $patient->id;
                        $contactPoint->value = $request->contact_value[$key];
                        $contactPoint->use = $request->contact_use[$key];
                        $contactPoint->save();
                    }
                }
                //foreach para eliminar contactos
                foreach ($storedContactIds as $key => $storedContactId) {
                    if (!in_array($storedContactId, $request->contact_point_id)) {
                        $contactPoint = ContactPoint::find($storedContactId);
                        $contactPoint->delete();
                    }
                }
            }


            //PRACTITIONER
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
                    } elseif (in_array($request->practitioner_id[$key], $storedPractitionerIds)) {
                        $practitioner = Practitioner::find($request->practitioner_id[$key]);
                        $practitioner->active = 1;
                        $practitioner->user_id = $patient->id;
                        $practitioner->organization_id = $request->organization_id[$key];
                        $practitioner->specialty_id = $request->specialty_id[$key];
                        $practitioner->profession_id = $request->profession_id[$key];
                        $practitioner->save();
                    }
                }
                //foreach para eliminar practitioners
                foreach ($storedPractitionerIds as $key => $storedPractitionerId) {
                    if (!in_array($storedPractitionerId, $request->practitioner_id)) {
                        $practitioner = Practitioner::find($storedPractitionerId);
                        $practitioner->delete();
                    }
                }
            }
            else {
                //Si no hay ninguno, elimina todo
                foreach ($storedPractitionerIds as $key => $storedPractitionerId) {
                        $practitioner = Practitioner::find($storedPractitionerId);
                        $practitioner->delete();
                }
            }

            //CONGREGATIONS
            $patient->congregations()->sync($request->congregation_id);

            $patient->save();

            $otherCongregation = $patient->congregationUsers()->where('congregation_id', 10);
            if ($otherCongregation->count() > 0) {
                $otherCongregation->update(['other' => $request->congregation_other,
                ]);
            }

            Db::commit();
        } catch (Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        if($request->session()->has('request_match')) $request->session()->forget('request_match');
        session()->flash('success', 'El paciente ' . $patient->officialFullName . ' ha sido actualizado.');
        return view('patients.show', compact('patient'));
    }

    /**
     * @param $patient
     * @param Request $request
     * @return void
     */
    public function updateSex($patient, Request $request): void
    {
        if ($request->sex === null)
            return;

        if ($patient->actualSex() === null) {
            $patient->sexes()->attach($request->sex, ['valid_from' => now()]);
            return;
        }

        if($request->sex == $patient->actualSex()->id)
            return;

        $patient->sexes()
            ->wherePivotNull('valid_to')
            ->updateExistingPivot($patient->actualSex(), ['valid_to' => now()]);

        $patient->sexes()->attach($request->sex, ['valid_from' => Carbon::now()->addSecond()]);
    }

    /**
     * @param $patient
     * @param Request $request
     * @return void
     */
    public function updateGender($patient, Request $request): void
    {
        if($request->gender === null)
            return;

        if ($patient->actualGender() === null) {
            $patient->genders()->attach($request->gender, ['valid_from' => now()]);
            return;
        }

        if($request->gender == $patient->actualGender()->id)
            return;

        $patient->genders()
            ->wherePivotNull('valid_to')
            ->updateExistingPivot($patient->actualGender(), ['valid_to' => now()]);

        $patient->genders()->attach($request->gender, ['valid_from' => Carbon::now()->addSecond()]);
    }

    /**
     * Retorna usuario para API
     * @param string $id
     * @return UserResource
     */
    public function getById(string $id)
    {
        $user = User::find($id);
        return new UserResource($user);
    }

    /**
     * Retorna usuario para API
     * @return UserResource
     */
    public function getByIdentifier(string $type, string $value)
    {
        $user = User::whereHas('identifiers', function ($q) use ($value, $type) {
            $q->where('cod_con_identifier_type_id', $type)
                ->where('value', $value);
        })->first();

        return new UserResource($user);
    }

    /**
     * Retorna usuarios para api
     * @param string $name
     * @return UserCollection
     */
    public function getByName(string $name)
    {
        $users = User::getUsersBySearch($name)->get();
        return new UserCollection($users);
    }

    public function showRecord($id)
    {
        $patient = User::findorfail($id);
        return view('patients.show_record', compact('patient'));
    }
}
