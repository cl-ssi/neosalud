@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Listado de Jefes de unidad</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.unit_heads.store') }}">
    @csrf
    @method('POST')

    <div class="row">
        <fieldset class="col">
            <label for="for_unit_code">Usuarios</label>
            <select name="user_id" id="for_user_id" class="form-control selectpicker" data-live-search="true" data-size="5" required>
                <option value=""></option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->OfficialFullName}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col">
            <label for="for_unit_code">Especialidad</label>
            <select name="specialty_id" id="for_specialty_id" class="form-control selectpicker" data-live-search="true" data-size="5">
                 <option value=""></option>
                @foreach($specialties as $specialty)
                    <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col">
            <label for="for_unit_code">Profesión</label>
            <select name="profession_id" id="for_profession_id" class="form-control selectpicker" data-live-search="true" data-size="5">
                <option value=""></option>
                @foreach($professions as $profession)
                    <option value="{{$profession->id}}">{{$profession->profession_name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-3">
            <br>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </fieldset>
    </div>
</form>
<br>
<hr>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>RUT</th>
            <th>DV</th>
            <th>Nombre</th>
            <th>Prof/Espec</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($units_heads as $units_head)
        <tr>
            <td>{{ $units_head->user->IdentifierRun->value }}</td>
            <td>{{ $units_head->user->IdentifierRun->dv }}</td>
            <td>{{ $units_head->user->OfficialFullName }}</td>
            <td nowrap>
                @if($units_head->specialty)
                    {{$units_head->specialty->specialty_name}}
                @endif
                @if($units_head->profession)
                    {{$units_head->profession->profession_name}}
                @endif
            </td>
            <td>
                <form method="POST" action="{{ route('medical_programmer.unit_heads.destroy', $units_head) }}" class="d-inline">
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
