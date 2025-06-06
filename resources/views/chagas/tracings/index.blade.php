@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h4 class="mb-3">Seguimiento/Notificación Casos Positivos del Establecimiento: {{ $organization->alias ?? '' }}</h4>
    <div class="table-responsive">
        <table class="table table-sm table-bordered" id="tabla_casos">
            <thead>
                <tr>
                    <th nowrap>ID</th>
                    <th>Fecha de Solicitud</th>
                    <th>Fecha de toma muestra</th>
                    <th>Origen</th>
                    <th>Nombre</th>
                    <th>RUN o Identificación</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Nacionalidad</th>
                    <th>Resultado Tamizaje</th>
                    <th>Fecha de Resultado Confirmación</th>
                    <th>Resultado Confirmación</th>
                    <th>Observación</th>
                    <th>Ver/Editar Seguimientos</th>
                    <th colspan="4">Contacto</th>
                </tr>
            </thead>
            <tbody id="tableCases">
                @foreach ($suspectcases as $suspectcase)
                    <tr>
                        <td>{{ $suspectcase->id ?? '' }}</td>
                        <td>{{ $suspectcase->request_at ?? '' }}</td>
                        <td>{{ $suspectcase->sample_at ?? '' }}</td>
                        <td>{{ $suspectcase->organization->alias ?? '' }}</td>
                        <td>{{ $suspectcase->patient->OfficialFullName ?? '' }}
                            @if ($suspectcase->research_group == 'Gestante (+semana gestacional)')
                                <img align="center" src="{{ asset('images/pregnant.png') }}" width="24">
                            @endif
                        </td>
                        <td>
                            @if ($suspectcase->patient->identifierRun)
                                {{ $suspectcase->patient->identifierRun->value ?? '' }}-{{ $suspectcase->patient->identifierRun->dv }}
                            @else
                                {{ $suspectcase->patient->Identification->value ?? '' }}
                            @endif
                        </td>
                        <td> {{ $suspectcase->patient->AgeString ?? '' }} </td>
                        <td>{{ $suspectcase->patient->actualSex()->text ?? '' }}</td>
                        <td>{{ $suspectcase->patient->nationality->name ?? '' }}</td>
                        <td>{{ $suspectcase->chagas_result_screening ?? '' }}</td>
                        <td>{{ $suspectcase->chagas_result_confirmation_at ?? '' }}</td>
                        <td>{{ $suspectcase->chagas_result_confirmation ?? '' }}</td>
                        <td>{{ $suspectcase->observation ?? '' }}</td>
                        <td>
                            <a href="{{ route('chagas.tracings.create', ['suspectcase' => $suspectcase, 'organization' => $organization]) }}"
                                class="btn_edit"><i class="fas fa-phone"></i><small> (crear seguimiento)</small></a>
                            <br>
                            @if ($suspectcase->tracings->count() > 0)
                                <ul class="list-unstyled">
                                    @foreach ($suspectcase->tracings as $tracing)
                                        <li>
                                            <a href="{{ route('chagas.tracings.edit', $tracing) }}" class="btn_edit">
                                                {{ $loop->iteration }}) Ficha de Seguimiento
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <small>No hay fichas de seguimiento disponibles</small>
                            @endif
                        </td>
                        <td colspan="2">
                            <a class="btn btn-primary btn-sm"
                                href="{{ route('chagas.contacts.create', $suspectcase) }}">
                                <i class="fas fa-plus"></i>
                            </a>
                            <ul class="list-unstyled">
                                @foreach ($suspectcase->patient->contacts as $contact)
                                    <li class="small">{{ $contact->patient->text ?? '' }}
                                        ({{ $contact->RelationshipName }})
                                        <form method="POST" action="{{ route('chagas.contacts.destroy', $contact) }}"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="text-danger ml-2"
                                                onclick="event.preventDefault(); if(confirm('¿Está seguro que desea eliminar al contacto?')) { this.closest('form').submit(); }"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </form>
                                    </li>
                                    <br>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection