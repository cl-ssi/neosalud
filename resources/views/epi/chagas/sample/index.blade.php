@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas Pendiente de Toma de Muestra de
        {{ $organization->alias ?? '' }}</h4>

    <form action="{{ route('chagas.sampleOrganization', $organization->id) }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o apellido"
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>

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
                                <form method="POST" action="{{ route('epi.chagas.destroy', $suspectcase) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Solicitud Chagas"
                                        onclick="return confirm('¿Está seguro de eliminar la solicitud de chagas?');">
                                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                                    </button>
                                </form>
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
