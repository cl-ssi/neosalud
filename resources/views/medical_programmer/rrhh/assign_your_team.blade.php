@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Asigna a tu equipo</h3>

<div class="alert alert-info" role="alert">
  Si no te aparecen especialidades ni profesiones, debes contactar al administrador del sistema para que te asigne como jefe de unidad.
</div>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.rrhh.store_assign_your_team') }}">
    @csrf
    @method('POST')

    <div class="row">
        <fieldset class="col-3">
            <label for="for_user_id">Funcionario</label>
            <select name="user_id" id="for_user_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->OfficialFullName}}</option>
                @endforeach
            </select>
        </fieldset>
    </div><br>


    @livewire('user.user-practitioners', compact('organizations', 'professions', 'specialties'))

    <br>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>


<hr>


<form method="GET" class="mb-3 row g-2 align-items-end">
    <div class="col-md-3">
        <label for="filter_type">Mostrar</label>
        <select name="filter_type" id="filter_type" class="form-control" onchange="this.form.submit()">
            <option value="all" {{ request('filter_type', 'all') == 'all' ? 'selected' : '' }}>Todas</option>
            <option value="specialty" {{ request('filter_type') == 'specialty' ? 'selected' : '' }}>Solo Especialidades</option>
            <option value="profession" {{ request('filter_type') == 'profession' ? 'selected' : '' }}>Solo Profesiones</option>
        </select>
    </div>
    @if(request('filter_type', 'all') == 'all' || request('filter_type') == 'specialty')
    <div class="col-md-3">
        <label for="specialty_id">Especialidad</label>
        <select name="specialty_id" id="specialty_id" class="form-control" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach($specialties as $specialty)
                <option value="{{$specialty->id}}" {{ request('specialty_id') == $specialty->id ? 'selected' : '' }}>{{$specialty->specialty_name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    @if(request('filter_type', 'all') == 'all' || request('filter_type') == 'profession')
    <div class="col-md-3">
        <label for="profession_id">Profesión</label>
        <select name="profession_id" id="profession_id" class="form-control" onchange="this.form.submit()">
            <option value="">Todas</option>
            @foreach($professions as $profession)
                <option value="{{$profession->id}}" {{ request('profession_id') == $profession->id ? 'selected' : '' }}>{{$profession->profession_name}}</option>
            @endforeach
        </select>
    </div>
    @endif
</form>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Especialidad / Profesión</th>
            <th>Funcionario</th>
            <th>Establecimiento</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @if(request('filter_type', 'all') == 'all' || request('filter_type') == 'specialty')
        @foreach($specialty_users as $specialty_user)
            @if(!request('specialty_id') || request('specialty_id') == $specialty_user->specialty_id)
            <tr>
                <td><span class="badge bg-primary">Especialidad</span></td>
                <td>{{$specialty_user->specialty->specialty_name}}</td>
                <td>{{$specialty_user->user->OfficialFullName}}</td>
                <td>{{$specialty_user->organization->name}}</td>
                <td>
                    <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_assign_your_team', $specialty_user) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                            <span class="fas fa-trash-alt" aria-hidden="true"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    @endif
    @if(request('filter_type', 'all') == 'all' || request('filter_type') == 'profession')
        @foreach($profession_users as $profession_user)
            @if(!request('profession_id') || request('profession_id') == $profession_user->profession_id)
            <tr>
                <td><span class="badge bg-success">Profesión</span></td>
                <td>{{$profession_user->profession->profession_name}}</td>
                <td>{{$profession_user->user->OfficialFullName}}</td>
                <td>{{$profession_user->organization->name}}</td>
                <td>
                    <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_assign_your_team', $profession_user) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                            <span class="fas fa-trash-alt" aria-hidden="true"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    @endif
    </tbody>
</table>



@if(!request('show_all'))
    @php
        $isSpecialtyPaginated = $specialty_users instanceof \Illuminate\Pagination\LengthAwarePaginator || $specialty_users instanceof \Illuminate\Pagination\Paginator;
        $isProfessionPaginated = $profession_users instanceof \Illuminate\Pagination\LengthAwarePaginator || $profession_users instanceof \Illuminate\Pagination\Paginator;
    @endphp
    @if($isSpecialtyPaginated && $isProfessionPaginated)
        @if($specialty_users->total() > $profession_users->total())
            {{ $specialty_users->links('pagination::bootstrap-4') }}
        @else
            {{ $profession_users->links('pagination::bootstrap-4') }}
        @endif
    @elseif($isSpecialtyPaginated)
        {{ $specialty_users->links('pagination::bootstrap-4') }}
    @elseif($isProfessionPaginated)
        {{ $profession_users->links('pagination::bootstrap-4') }}
    @endif
@endif

@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
@endsection