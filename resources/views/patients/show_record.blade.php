@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header" style="background-color: #f2f2f2; text-align: center;">
            <h4 style="margin: 0;">Ficha de Paciente {{ $patient->OfficialFullName ?? '' }}</h4>
        </div>
        <div class="card-body">
            <h5>Datos de Paciente</h5>
            <hr>
            <div>
                <!--**********************************-->
                <div class="row">
                    <fieldset class="form-group col-10 col-sm-4 col-md-2 col-lg-2">
                        <label for="for_run">Run</label>
                        <input type="text" class="form-control" id="for_run" name="run"
                            value="{{ $patient->identifierRun->value ?? '' }}" max="80000000" readonly>
                    </fieldset>

                    <fieldset class="form-group col-2 col-sm-2 col-md-1 col-lg-1">
                        <label for="for_dv">DV</label>
                        <input type="text" class="form-control" id="for_dv" name="dv"
                            value="{{ $patient->identifierRun->dv ?? '' }}" readonly>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-6 col-md-3 col-lg-3">
                        <label for="for_other_identification">Otra identificación</label>
                        <input type="text" class="form-control" id="for_other_identification"
                            placeholder="Extranjeros sin run" name="other_identification"
                            value="{{ $patient->identifierNotRun->value ?? '' }}" readonly>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-4 col-md-3 col-lg-3">
                        <label for="for_sexo">Sexo</label>
                        <input type="text" class="form-control" value="{{ $patient->actualSex ?? '' }}" readonly>

                    </fieldset>

                    <fieldset class="form-group col-8 col-sm-5 col-md-3 col-lg-2">
                        <label for="for_birthday">Fecha Nacimiento</label>
                        <input type="date" class="form-control" id="for_birthday" required name="birthday"
                            value="{{ $patient->birthday ? $patient->birthday->format('Y-m-d') : '' }}" readonly>
                    </fieldset>
                </div>

                <!--**********************************-->
                <br>
                <div class="row">
                    <fieldset class="form-group col-12 col-sm-4 col-md-4">
                        <label for="for_name">Nombres</label>
                        <input type="text" class="form-control" id="for_name" name="name"
                            value="{{ $patient->given ?? '' }}" style="text-transform: uppercase;" required readonly>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-4 col-md-4">
                        <label for="for_fathers_family">Apellido Paterno</label>
                        <input type="text" class="form-control" id="for_fathers_family" name="fathers_family"
                            value="{{ $patient->fathers_family ?? '' }}" style="text-transform: uppercase;" required
                            readonly>
                    </fieldset>

                    <fieldset class="form-group col-12 col-sm-4 col-md-4">
                        <label for="for_mothers_family">Apellido Materno</label>
                        <input type="text" class="form-control" id="for_mothers_family" name="mothers_family"
                            value="{{ $patient->mothers_family ?? '' }}" style="text-transform: uppercase;" readonly>
                    </fieldset>

                </div>

            </div>
        </div>

        <div class="card-body">
            {{-- Comienza las direcciones --}}
            <h4 class="mt-4">Direcciones</h4>
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>Tipo</th>
                            <th>Calle</th>
                            <th>Número</th>
                            <th>Depto</th>
                            <th>Población/Villa/Condominio</th>
                            <th>Región</th>
                            <th>Comuna</th>
                            <th>Pais</th>
                        </tr>
                    </thead>
                    @foreach ($patient->addresses as $address)
                        <tr>
                            <td>{{ $address->use_value ?? '' }} </td>
                            <td>{{ $address->text ?? '' }} </td>
                            <td>{{ $address->line ?? '' }} </td>
                            <td>{{ $address->apartment ?? '' }} </td>
                            <td>{{ $address->suburb ?? '' }} </td>
                            <td>{{ $address->region->name ?? '' }} </td>
                            <td>{{ $address->commune->name ?? '' }} </td>
                            <td>{{ $address->country->name ?? '' }} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="card-body">
            {{-- Comienza las maneras de contactar --}}
            <h4 class="mt-4">Formas de Contactar al Paciente</h4>
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>Tipo de Contacto</th>
                            <th>Uso</th>
                            <th>Contacto</th>
                        </tr>
                    </thead>
                    @foreach ($patient->contactPoints as $contactpoint)
                        <tr>
                            <td>{{ $contactpoint->system_value ?? '' }} </td>
                            <td>{{ $contactpoint->use_value ?? '' }} </td>
                            <td>{{ $contactpoint->value ?? '' }} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="card-body">
            {{-- Comienza las maneras de contactar --}}
            <h4 class="mt-4">Examenes</h4>
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de Examen</th>
                            <th>Grupo de Pesquisa</th>
                            <th>Establecimiento</th>
                            <th>Fecha Solicitud</th>
                            <th>Fecha Toma de Muestra</th>
                            <th>Fecha Tamizaje</th>
                            <th>Resultado Tamizaje</th>
                            <th>Fecha Confirmación</th>
                            <th>Resultado Confirmación</th>
                        </tr>
                    </thead>
                    @foreach ($patient->suspectCases as $suspectcase)
                        <tr>
                            <td>{{ $suspectcase->id ?? '' }} </td>
                            <td>{{ $suspectcase->type ?? '' }} </td>
                            <td>{{ $suspectcase->research_group ?? '' }} </td>
                            <td>{{ $suspectcase->establishment->alias ?? '' }} </td>
                            <td>{{ $suspectcase->request_at ?? '' }} </td>
                            <td>{{ $suspectcase->sample_at ?? '' }} </td>
                            <td>{{ $suspectcase->chagas_result_screening_at ?? '' }} </td>
                            <td>
                                {{ $suspectcase->chagas_result_screening ?? '' }}
                                @if ($suspectcase->chagas_result_screening_file)
                                    <a href="{{ route('epi.chagas.downloadFile', ['fileName' => $suspectcase->chagas_result_screening_file]) }}"
                                        target="_blank"><i class="fas fa-paperclip"></i>&nbsp
                                    </a>
                                @endif
                            </td>
                            <td>{{ $suspectcase->chagas_result_confirmation_at ?? '' }} </td>
                            <td>{{ $suspectcase->chagas_result_confirmation ?? '' }}
                                @if ($suspectcase->chagas_result_confirmation_file)
                                    <a href="{{ route('epi.chagas.downloadFile', ['fileName' => $suspectcase->chagas_result_confirmation_file]) }}"
                                        target="_blank"><i class="fas fa-paperclip"></i>&nbsp
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        @can(['administrador'])
            @foreach ($patient->suspectCases as $suspectcase)
                <br /><hr />
                <div style="height: 300px; overflow-y: scroll;">
                    @include('partials.audit', ['audits' => $suspectcase] )
                </div>
            @endforeach

        @endcan


        <div class="card-body">
            {{-- Comienza las maneras de contactar --}}
            <h4 class="mt-4">Ficha de Seguimiento del Paciente</h4>
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Proximo Seguimiento</th>
                            <th>Fecha de Notificación</th>
                            <th>Folio Epivigilia</th>
                        </tr>
                    </thead>
                    @foreach ($patient->tracings as $tracing)
                        <tr>
                            <td>
                                <a href="{{ route('chagas.tracings.show', ['tracing' => $tracing->id]) }}"
                                    target="_blank">
                                    <i class="fas fa-search"></i>
                                </a>
                                {{ $tracing->id ?? '' }}
                            </td>
                            <td>{{ $tracing->next_control_at ?? '' }} </td>
                            <td>{{ $tracing->date_of_notification ?? '' }} </td>
                            <td>{{ $tracing->epi_notification ?? '' }} </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>



        <div class="card-body">
            {{-- Comienza las maneras de contactar --}}
            <h4 class="mt-4">Contactos Estrechos del Paciente</h4>
            <div class="table-responsive-md">
                <table class="table table-sm table-bordered mb-4 mt-4">
                    <thead>
                        <tr>
                            <th>Nombre del Paciente</th>
                            <th>Nombre del Contacto Estrecho</th>
                            <th>Fecha Ultimo Contacto</th>
                            <th>Parentesco</th>
                            <th>Viven Juntos</th>
                            <th>Observacion</th>
                        </tr>
                    </thead>
                    @foreach ($patient->contacts as $contact)
                        <tr>
                            <td>{{ $patient->OfficialFullName ?? '' }} </td>
                            <td>{{ $contact->patient->OfficialFullName ?? '' }} </td>
                            <td>{{ $contact->last_contact_at ?? '' }} </td>
                            <td>{{ $contact->RelationshipName ?? '' }}</td>
                            <td>{{ $contact->LiveTogetherDesc ?? '' }}</td>
                            <td>{{ $contact->observation ?? '' }}</td>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>






    </div>
@endsection
