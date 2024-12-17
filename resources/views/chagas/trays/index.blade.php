@extends('layouts.app')
@section('content')
    @include('chagas.nav')

    {{-- Formulario para "myTray" --}}
    @if ($trayType === 'myTray')
        <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas Solicitado por @auth {{ auth()->user()->officialFullName }} @endauth</h4>
        <form action="{{ route('chagas.myTray') }}" method="GET">
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

        <div>
            <a class="btn btn-primary" href="{{ route('chagas.exportExcel', ['search' => request('search'), 'my_tray' => true]) }}">
                <i class="fas fa-file-excel"></i> Descargar en Excel resultados
            </a>
        </div>
    @endif

    {{-- Formulario para "allMyTray" --}}
    @if ($trayType === 'allMyTray')
        <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas para Todas Mis Organizaciones</h4>
        <form action="{{ route('chagas.allMyTray') }}" method="GET">
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

        <div>
            <a class="btn btn-primary" href="{{ route('chagas.exportExcel', ['search' => request('search'), 'all_my_tray' => true]) }}">
                <i class="fas fa-file-excel"></i> Descargar en Excel resultados
            </a>
        </div>
    @endif

    {{-- Formulario para "tray" con organización específica --}}
    @if ($trayType === 'tray' && isset($organization))
        <h4 class="mb-3">Listado de Solicitudes de Exámenes de Chagas Solicitado del Establecimiento {{ $organization->alias ?? '' }}</h4>
        <form action="{{ route('chagas.tray', $organization->id) }}" method="GET">
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

        <div>
            <a class="btn btn-primary" href="{{ route('chagas.exportExcel', ['organization' => $organization->id, 'search' => request('search')]) }}">
                <i class="fas fa-file-excel"></i> Descargar en Excel resultados
            </a>
        </div>
    @endif

        <br>

    <div class="table-responsive">
        <table class="table table-sm table-bordered" id="tabla_casos">
            <thead>
                <tr>
                    <th nowrap>ID</th>
                    <th>Grupo de Pesquisa</th>
                    <th>Solicitado Por</th>
                    <th>Fecha de Solicitud</th>
                    <th>Tomado de Muestra Por</th>
                    <th>Fecha de Toma de Muestra</th>
                    <th>Origen</th>
                    <th>Paciente</th>
                    <th>RUN o Identificacón</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Nacionalidad</th>
                    <th>Fecha de Resultado Tamizaje</th>
                    <th>Resultado Tamizaje</th>
                    <th>Fecha de Resultado Confirmación</th>
                    <th>Resultado Confirmación</th>
                    <th>Observación</th>
                    <th>Eliminar Solicitud <small>(Se puede eliminar solo si no está recepcionado)</small></th>
                </tr>
            </thead>
            <tbody id="tableCases">
                @foreach ($suspectcases as $suspectcase)
                    <tr>
                        <td>{{ $suspectcase->id ?? '' }}</td>
                        <td>{{ $suspectcase->research_group ?? '' }}</td>
                        <td>{{ $suspectcase->requester->officialFullName ?? '' }}</td>
                        <td>{{ $suspectcase->request_at ?? '' }}</td>
                        <td>{{ $suspectcase->sampler->officialFullName ?? '' }}</td>
                        <td>{{ $suspectcase->sample_at ?? '' }}</td>
                        <td>
                        {{ $suspectcase->organization->alias ?? '' }}
                        </td>
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
                        <td>
                            {{ $suspectcase->chagas_result_screening_at ?? '' }}
                        </td>
                        <td>
                            {{ $suspectcase->chagas_result_screening ?? '' }}
                            @if ($suspectcase->chagas_result_screening_file)
                                <a href="{{ route('epi.chagas.downloadFile', ['fileName' => $suspectcase->chagas_result_screening_file]) }}"
                                    target="_blank" data-toggle="tooltip" data-placement="top"
                                    data-original-title="{{ $suspectcase->id . 'pdf' }}">Descargar <i
                                        class="fas fa-paperclip"></i>&nbsp
                                </a>
                            @endif

                        </td>
                        <td>{{ $suspectcase->chagas_result_confirmation_at ?? '' }}</td>
                        <td>{{ $suspectcase->chagas_result_confirmation }}

                            @if ($suspectcase->chagas_result_confirmation_file)
                                <a href="{{ route('epi.chagas.downloadFile', ['fileName' => $suspectcase->chagas_result_confirmation_file]) }}"
                                    target="_blank" data-toggle="tooltip" data-placement="top"
                                    data-original-title="{{ $suspectcase->id . 'pdf' }}">Descargar <i
                                        class="fas fa-paperclip"></i>&nbsp
                                </a>
                            @endif
                        </td>
                        <td>{{ $suspectcase->observation ?? '' }}</td>
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
