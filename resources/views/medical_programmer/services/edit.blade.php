@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Editar Servicio</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.services.update', $service) }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <fieldset class="form-group col">
            <label for="for_service_code">Código de Servicio</label>
            <input type="text" class="form-control" id="for_service_code" placeholder="" name="service_code" value="{{$service->service_code}}">
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_description">Servicio</label>
            <input type="text" class="form-control" id="for_service_name" placeholder="" name="service_name" required value="{{$service->service_name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $service->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection
