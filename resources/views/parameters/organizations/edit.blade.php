@extends('layouts.app')

@section('title', 'Editar Organizaciones')

@section('content')

@canany(['Mp: user'])
    @include('medical_programmer.nav')
@endcanany

<h3 class="mb-3">Editar Organizaciones</h3>

<form method="POST" class="form-horizontal" action="{{ route('parameter.organization.update', $organization) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <fieldset class="col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" name="name" value="{{ $organization->name }}" required>
        </fieldset>

        <fieldset class="col">
            <label for="for_description">Alias</label>
            <input type="text" class="form-control" id="for_alias" name="alias" value="{{ $organization->alias }}" required>
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="col">
            <label for="for_code_deis">Código DEIS</label>
            <input type="integer" class="form-control" id="for_code_deis" name="code_deis" value="{{ $organization->code_deis }}">
        </fieldset>

        <fieldset class="col">
            <label for="for_name">Código SIRH</label>
            <input type="integer" class="form-control" id="for_sirh_code" name="sirh_code" value="{{ $organization->sirh_code }}">
        </fieldset>
    </div>

    <br>

    <button type="submit" class="btn btn-primary float-left">Guardar</button>
</form>


<form method="POST" class="form-horizontal" action="{{ route('parameter.organization.destroy', $organization) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger float-right">Eliminar</button>
</form>

@endsection