<?php

namespace App\Http\Controllers\Epi;

use App\Models\Epi\SuspectCase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Mail;
use App\Mail\DelegateChagasNotification;
use Illuminate\Support\Facades\Storage;

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
            $suspectcases = SuspectCase::where('organization_id', Auth::user()->practitioners->last()->organization->id)->orderByDesc('id')->paginate(100);
        } else {
            $suspectcases = SuspectCase::orderByDesc('id')->whereNotNull('sample_at')->paginate(100);
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

    public function requestChaga(User $user)
    {
        return view('epi.chagas.request');
    }

    public function confirmRequestChaga(User $patient, Organization $organization)
    {
        return view('epi.chagas.create', compact('patient', 'organization'));
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
        $sc->requester_id = Auth::id();
        $sc->request_at =  date('Y-m-d H:i:s');
        $sc->save();
        session()->flash('success', 'Se creo caso sospecha exitosamente, esperando por su toma de muestra');
        return redirect()->route('chagas.welcome');
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
        if ($request->hasFile('chagas_result_screening_file')) {
            $file_name = $suspectCase->id . '_screening';
            $file = $request->file('chagas_result_screening_file');
            $suspectCase->chagas_result_screening_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), ['disk' => 'gcs']);
        }

        if ($request->hasFile('chagas_result_confirmation_file')) {
            $file_name = $suspectCase->id . '_confirmation';
            $file = $request->file('chagas_result_confirmation_file');
            $suspectCase->chagas_result_confirmation_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), 'gcs');
        }

        if ($request->hasFile('direct_exam_file')) {
            $file_name = $suspectCase->id . '_direct_exam';
            $file = $request->file('direct_exam_file');
            $suspectCase->direct_exam_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), 'gcs');
        }

        if ($request->hasFile('pcr_first_file')) {
            $file_name = $suspectCase->id . '_primer_pcr';
            $file = $request->file('pcr_first_file');
            $suspectCase->pcr_first_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), 'gcs');
        }

        if ($request->hasFile('pcr_second_file')) {
            $file_name = $suspectCase->id . '_segunda_pcr';
            $file = $request->file('pcr_second_file');
            $suspectCase->pcr_second_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), 'gcs');
        }

        if ($request->hasFile('pcr_third_file')) {
            $file_name = $suspectCase->id . '_tercera_pcr';
            $file = $request->file('pcr_third_file');
            $suspectCase->pcr_third_file = $file->storeAs('/unisalud/chagas', $file_name . '.' . $file->extension(), 'gcs');
        }

        $suspectCase->save();

        if ($request->chagas_result_screening == 'En Proceso') {
            $organization = Organization::where('id', $suspectCase->organization_id)->first();
            $epi_mails = $organization->epi_mail;
            $emails = explode(',', $epi_mails);

            foreach ($emails as $email) {
                Mail::to(trim($email))->send(new DelegateChagasNotification($suspectCase));
            }
        }


        session()->flash('success', 'Se añadieron los datos adicionales a Caso sospecha');
        return redirect()->back();
    }

    public function downloadFile($fileName)
    {

        return Storage::disk('gcs')->download($fileName);
    }

    public function deleteFile(SuspectCase $suspectCase, $attribute)
    {
        $fileAttribute = $attribute . '_file';
        if ($suspectCase->$fileAttribute) {
            Storage::disk('gcs')->delete($suspectCase->$fileAttribute);
            $suspectCase->$fileAttribute = null;
            $suspectCase->save();
            session()->flash('info', 'Se ha eliminado el archivo correctamente.');
        }
        return redirect()->route('chagas.welcome');
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
        $permissions = Permission::where('name', 'LIKE', 'Chagas%')->OrderBy('name')->get();
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
            $query->where('name', 'LIKE', 'Chagas%')->OrderBy('name');
        })->get();

        return view('epi.chagas.user_index', compact('organizations', 'users'));
    }

    public function patientRecord()
    {

        return view('patients.record');
    }




    public function editChagasUser(User $user)
    {
        $permissions = Permission::where('name', 'LIKE', 'Chagas%')->get();

        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
            ->orderBy('alias')
            ->get();


        return view('epi.chagas.user_edit', compact('user', 'organizations', 'permissions'));
    }

    public function sampleOrganization(Organization $organization)
    {
        $suspectcases = SuspectCase::where('organization_id', $organization->id)
            ->whereNotNull('requester_id')
            ->whereNull('sampler_id')
            ->orderByDesc('id')
            ->paginate(100);

        return view('epi.chagas.sample.index', compact('organization', 'suspectcases'));
    }


    public function sampleBlood($id)
    {
        $suspectCase = SuspectCase::findOrFail($id);
        $suspectCase->sampler_id = Auth::id();
        $suspectCase->sample_at = date('Y-m-d H:i:s');
        $suspectCase->save();
        session()->flash('success', 'Se tomó la muestra de de sangre de manera exitosa');
        return redirect()->back();
    }

    public function myTray()
    {
        $suspectcases = SuspectCase::where('requester_id', Auth::user()->id)->orderByDesc('id')
            ->paginate(100);

        // $suspectcases = SuspectCase::where('requester_id', 2467)->orderByDesc('id')
        //     ->paginate(100);

        return view('chagas.trays.index', compact('suspectcases'));
    }

    public function tray(Organization $organization)
    {
        $suspectcases = SuspectCase::where('organization_id', $organization->id)->orderByDesc('id')
            ->paginate(100);
        return view('chagas.trays.index', compact('suspectcases', 'organization'));
    }
}
