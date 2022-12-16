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

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Especialidad/Profesión</th>
            <th>Funcionario</th>
            <th>Establecimiento</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($specialty_users as $specialty_user)
        <tr>
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
        @endforeach

        @foreach($profession_users as $profession_user)
        <tr>
            <td>{{$profession_user->profession->profession_name}}</td>
            <td>{{$profession_user->user->OfficialFullName}}}</td>
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
        @endforeach
    </tbody>
</table> 


@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
@endsection