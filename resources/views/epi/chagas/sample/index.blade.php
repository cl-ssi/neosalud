@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas Pendiente de Toma de Muestra de
        {{ $organization->alias ?? '' }}</h4>

    <form action="{{ route('chagas.sampleOrganization', $organization->id) }}" method="GET">
        <div class="col-md-4">
            <label for="start_date">Fecha de Inicio</label>
            <input type="date" name="start_date" class="form-control" 
                value="{{ request('start_date', now()->startOfMonth()->format('Y-m-d')) }}">
        </div>
        <div class="col-md-4">
            <label for="end_date">Fecha de Término</label>
            <input type="date" name="end_date" class="form-control" 
                value="{{ request('end_date', now()->format('Y-m-d')) }}">
        </div>
        <div class="col-md-4">
            <label for="search">Búsqueda</label>
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre, apellido, RUN (sin dv) o identificación"
                    value="{{ request('search') }}" autocomplete="off">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form><br>

    <div class="table-responsive">
        <table class="table table-sm table-bordered" id="tabla_casos">
            <thead>
                <tr>
                    <th nowrap>ID</th>
                    <th>Grupo de Pesquisa</th>
                    <th>Organización</th>
                    <th>Nombre Paciente</th>
                    <th>RUN o Identificación</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Nacionalidad</th>
                    <th>Observacion</th>
                    <th>Solicitado por</th>
                    <th>Fecha de Solicitud</th>
                    <th>Tomar muestra</th>
                    <th>
                        Eliminar Solicitud <br><small>(Se puede eliminar solo si no está recepcionado)</small>
                    </th>
                </tr>
            </thead>
            <tbody id="tableCases">
                @foreach ($suspectcases as $suspectcase)
                    <tr>
                        <td>{{ $suspectcase->id ?? '' }}</td>
                        <td>{{ $suspectcase->research_group ?? '' }}</td>
                        <td>{{ $organization->alias ?? '' }} </td>
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
                        <td>
                            {{ $suspectcase->patient->AgeString ?? '' }}
                        </td>
                        <td>{{ $suspectcase->patient->actualSex()->text ?? '' }}</td>
                        <td>{{ $suspectcase->patient->nationality->name ?? '' }}</td>
                        <td>{{ $suspectcase->observation ?? '' }}</td>
                        <td>{{ $suspectcase->requester->OfficialFullName ?? '' }}</td>
                        <td>{{ $suspectcase->request_at ?? '' }}</td>
                        <td>
                            <a class="virus-button btn btn-link" type="button" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal{{ $suspectcase->id }}">
                                <i class="fa-solid fa-vial-virus"></i>
                            </a>
                            @include('epi.chagas.modals.sample')
                        </td>
                        <td>
                            @if ($suspectcase->reception_at == null)
                                <a class="btn btn-sm btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $suspectcase->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                @include('epi.chagas.modals.delete_reason')
                            @endif
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $suspectcases->appends(request()->query())->links() }}
    </div>
@endsection

@section('custom_js')
@endsection
