@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nueva Locación</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.locations.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-3">
        <label for="for_status">Estado</label>
        <select id="for_status" name="status" class="form-control" required>
                <option></option>
                <option value="active" {{old('status') === 'active'? 'selected' : ''}}>Activo</option>
                <option value="suspended" {{old('status') === 'suspended'? 'selected' : ''}}>Suspendido</option>
                <option value="inactive" {{old('status') === 'inactive'? 'selected' : ''}}>Inactivo</option>
            </select> 
        </fieldset>           

        <fieldset class="form-group col-6 col-md-5">
            <label for="for_name">Nombre Locación</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="name" required>
        </fieldset>           

        <fieldset class="form-group col-6 col-md-4">
            <label for="for_alias">Alias</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="alias" required>
        </fieldset>
    <div class="form-row">
    </div>
        <fieldset class="form-group col-6 col-md-6">
        <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required>
        </fieldset>

        <fieldset class="form-group col-12 col-md-6">
            <label for="for_cod_con_organization_id">Organizacion</label>
            <select name="organization_id" id="for_cod_con_organization_id" class="form-control" required>
            <option value=""></option>
            @foreach($organization as $organization)
                <option value="{{ $organization->id }}" {{(old('cod_con_organization_id') == $organization->id) ? 'selected' : ''}}>{{ $organization->name }}</option>
            @endforeach
            </select>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection