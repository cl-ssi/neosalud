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
use App\Exports\Chagas\SuspectCaseExport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function destroy(SuspectCase $suspectCase, Request $request)
    {
        
        $deleteReason = $request->input('delete_reason');
        $suspectCase->delete_reason = $deleteReason;
        $suspectCase->delete_user_id = auth()->user()->id;
        $suspectCase->save();

        $suspectCase->delete();
        session()->flash('success', 'El caso sospecha ha sido eliminado exitosamente');
        return redirect()->back();
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

    public function indexChagasUser(Request $request)
    {
        $organizations = Organization::whereIn('id', Auth::user()->practitioners->pluck('organization_id'))
            ->orderBy('alias')
            ->get();
    
        $userTrayIds = Auth::user()->practitioners->pluck('organization_id');
    
        $query = User::whereHas('practitioners', function ($query) use ($userTrayIds) {
            $query->whereIn('organization_id', $userTrayIds);
        })->whereHas('permissions', function ($query) {
            $query->where('name', 'LIKE', 'Chagas%')->OrderBy('name');
        });
    
        
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
    
            // Dividir la cadena de búsqueda en palabras
            $searchTerms = explode(' ', $searchTerm);
    
            $query->where(function ($q) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $q->where(function ($qq) use ($term) {
                        $qq->where('given', 'LIKE', "%$term%")
                            ->orWhere('fathers_family', 'LIKE', "%$term%")
                            ->orWhere('mothers_family', 'LIKE', "%$term%")
                            ->orWhereHas('identifiers', function ($query) use ($term) {
                                $query->where('value', 'LIKE', '%' . $term . '%');
                            });
                    });
                }
            });
        }
    
        $users = $query->get();
    
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
        $searchTerm = request('search');
    
        $suspectcases = SuspectCase::where('organization_id', $organization->id)
            ->with([
                'patient',
                'requester',
            ])
            ->whereNotNull('requester_id')
            ->whereNull('sampler_id')
            ->when($searchTerm, function ($query, $searchTerm) {
    
                $searchWords = explode(' ', $searchTerm);
                foreach ($searchWords as $word) {
                    $query->whereHas('patient', function ($query) use ($word) {
                        // Búsqueda por nombre o apellidos del paciente
                        $query->where('given', 'LIKE', '%' . $word . '%')
                            ->orWhere('fathers_family', 'LIKE', '%' . $word . '%')
                            ->orWhere('mothers_family', 'LIKE', '%' . $word . '%')
    
                            // Búsqueda por identificadores del paciente
                            ->orWhereHas('identifiers', function ($query) use ($word) {
                                $query->where('value', 'LIKE', '%' . $word . '%');
                            });
                    });
                }
            })
            ->orderByDesc('id')
            ->paginate(100);
    
        return view('epi.chagas.sample.index', compact('organization', 'suspectcases'));
    }
    


    public function sampleBlood($id, Request $request)
    {
        $suspectCase = SuspectCase::findOrFail($id);
        $suspectCase->sampler_id = Auth::id();
        $suspectCase->sample_at = $request->input('sample_at');
        $suspectCase->save();
        session()->flash('success', 'Se tomó la muestra de de sangre de manera exitosa');
        return redirect()->back();
    }

    public function myTray()
    {
        $trayType = 'myTray';
        $searchTerm = request('search');

        $suspectcases = SuspectCase::where('requester_id', Auth::user()->id)->orderByDesc('id')
        ->with([
            'requester',
            'sampler',
            'patient',
        ])
        ->when($searchTerm, function ($query, $searchTerm) {
            $searchWords = explode(' ', $searchTerm);
            foreach ($searchWords as $word) {
                $query->whereHas('patient', function ($query) use ($word) {
                    $query->where('given', 'LIKE', '%' . $word . '%')
                        ->orWhere('fathers_family', 'LIKE', '%' . $word . '%')
                        ->orWhere('mothers_family', 'LIKE', '%' . $word . '%')
                        ->orWhereHas('identifiers', function ($query) use ($word) {
                            $query->where('value', 'LIKE', '%' . $word . '%');
                        });
                });
            }
        })
            ->paginate(100);


        return view('chagas.trays.index', compact('suspectcases', 'trayType'));
    }

    public function tray(Organization $organization)
    {
        $trayType = 'tray';
        $searchTerm = request('search');
        $suspectcases = SuspectCase::where('organization_id', $organization->id)->orderByDesc('id')
        ->with([
            'requester',
            'organization',
            'patient',
        ])
            ->when($searchTerm, function ($query, $searchTerm) {
                $searchWords = explode(' ', $searchTerm);
                foreach ($searchWords as $word) {
                    $query->whereHas('patient', function ($query) use ($word) {
                        $query->where('given', 'LIKE', '%' . $word . '%')
                            ->orWhere('fathers_family', 'LIKE', '%' . $word . '%')
                            ->orWhere('mothers_family', 'LIKE', '%' . $word . '%')
                            ->orWhereHas('identifiers', function ($query) use ($word) {
                                $query->where('value', 'LIKE', '%' . $word . '%');
                            });
                    });
                }
            })
            ->paginate(100);
        return view('chagas.trays.index', compact('suspectcases', 'organization', 'trayType'));
    }

    public function allMyTray()
    {
        $trayType = 'allMyTray';
        $searchTerm = request('search');
        
        $organizationIds = Auth::user()->practitioners->pluck('organization_id');

        $suspectcases = SuspectCase::whereIn('organization_id', $organizationIds)
            ->orderByDesc('id')
            ->with([
                'requester',
                'organization',
                'patient',
            ])
            ->when($searchTerm, function ($query, $searchTerm) {
                $searchWords = explode(' ', $searchTerm);
                foreach ($searchWords as $word) {
                    $query->whereHas('patient', function ($query) use ($word) {
                        $query->where('given', 'LIKE', '%' . $word . '%')
                            ->orWhere('fathers_family', 'LIKE', '%' . $word . '%')
                            ->orWhere('mothers_family', 'LIKE', '%' . $word . '%')
                            ->orWhereHas('identifiers', function ($query) use ($word) {
                                $query->where('value', 'LIKE', '%' . $word . '%');
                            });
                    });
                }
            })
            ->paginate(100);
    
        
        return view('chagas.trays.index', compact('suspectcases', 'trayType'));
    }
    

    /**
     * Exporta a Excel el listado de solicitudes de examenes de Chagas
     *
     * @return \Illuminate\Http\Response
     */
    public function exportExcel(Request $request)
    {
        // Capturamos el tipo de tray
        $trayType = $request->input('my_tray') ? 'myTray' : ($request->input('all_my_tray') ? 'allMyTray' : 'tray');
        $searchTerm = $request->input('search');
        
        // Obtenemos las organizaciones del usuario autenticado
        $organizationIds = Auth::user()->practitioners->pluck('organization_id');
        $organizationId = $request->input('organization');
    
        // Consultamos los casos sospechosos con los filtros correspondientes
        if($trayType == 'myTray'){
        $suspectcases = SuspectCase::when($trayType === 'myTray', function ($query) {
                $query->where('requester_id', Auth::user()->id);
            });
        } else {

        
        
        $suspectcases = SuspectCase::when($trayType === 'allMyTray' && $organizationId == null, function ($query) use ($organizationIds) {
                $query->whereIn('organization_id', $organizationIds);
            }, function ($query) use ($organizationId) {
                $query->where('organization_id', $organizationId);
            });

        }

        $suspectcases = $suspectcases->orderByDesc('id')
            ->with(['requester', 'organization', 'patient'])
            ->when($searchTerm, function ($query, $searchTerm) {
                $searchWords = explode(' ', $searchTerm);
                foreach ($searchWords as $word) {
                    $query->whereHas('patient', function ($query) use ($word) {
                        $query->where('given', 'LIKE', '%' . $word . '%')
                            ->orWhere('fathers_family', 'LIKE', '%' . $word . '%')
                            ->orWhere('mothers_family', 'LIKE', '%' . $word . '%')
                            ->orWhereHas('identifiers', function ($query) use ($word) {
                                $query->where('value', 'LIKE', '%' . $word . '%');
                            });
                    });
                }
            })
            ->get()
            ->map(function ($suspectCase) {
                return [
                    'ID' => $suspectCase->id,
                    'Grupo de Pesquisa' => $suspectCase->research_group,
                    'Solicitado por' => $suspectCase->requester?->officialFullName,
                    'Fecha de Solicitud' => $suspectCase->request_at,
                    'Origen' => $suspectCase->organization->alias,
                    'Paciente' => $suspectCase->patient?->officialFullName,
                    'Run o Identificación' => $suspectCase->patient->identifierRun
                        ? $suspectCase->patient->identifierRun->value . '-' . $suspectCase->patient->identifierRun->dv
                        : $suspectCase->patient->identification->value,
                    'Edad' => $suspectCase->patient->AgeString,
                    'Sexo' => $suspectCase->patient->actualSex()->text ?? '',
                    'Nacionalidad' => $suspectCase->patient->nationality->name ?? '',
                    'Fecha de Resultado Tamizaje' => $suspectCase->chagas_result_screening_at,
                    'Resultado Tamizaje' => $suspectCase->chagas_result_screening,
                    'Fecha de Resultado Confirmación' => $suspectCase->chagas_result_confirmation_at,
                    'Resultado Confirmación' => $suspectCase->chagas_result_confirmation,
                    'Observación' => $suspectCase->observation,
                ];
            });
    
        // Se retorna el archivo de Excel
        return Excel::download(new SuspectCaseExport($suspectcases), 'reporte_chagas.xlsx');
    }
    
    
    


}
