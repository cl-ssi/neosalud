@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Listado Visadores</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.visator_users.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="col">
            <label for="for_establishment_id">Establecimiento</label>
            <select name="establishment_id" id="for_establishment_id"  class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                @foreach($organizations as $organization)
                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col-3">
            <label for="for_user_id">Funcionario</label>
            <select name="user_id" id="for_user_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->OfficialFullName}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col-3">
            <label for="for_permission">Permiso</label>
            <select name="permission" id="for_permission" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                <option value="Referente de programación - Médico">Referente de programación - médico</option>
                <option value="Referente de programación - No médico">Referente de programación - No médico</option>
            </select>
        </fieldset>

        <fieldset class="col-3">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
    </div>

    

</form>

<hr>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Establecimiento</th>
            <th>Funcionario</th>
            <th>Permiso</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($visatorUsers as $visatorUser)
            <tr>
                <td>{{$visatorUser->establishment->name}}</td>
                <td>{{$visatorUser->users->OfficialFullName}}</td>
                <td>{{$visatorUser->permission}}</td>
                <td>
      				<form method="POST" action="{{ route('medical_programmer.visator_users.destroy', $visatorUser) }}" class="d-inline">
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
