@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar móvil en servicio</h3>

<form method="POST" action="{{ route('samu.mobileinservice.update', $mobileInService) }}">
    @csrf
    @method('PUT')

    <div class="row">

        <fieldset class="form-group col-sm-1">
            <label for="for-position">Posición</label>
            <input type="number" value="{{ $mobileInService->position }}" class="form-control" name="position" id="for-position">
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-mobile-id">Móvil*</label>
            <select class="form-select" name="mobile_id" id="for-mobile-id" required>
                @foreach($mobiles as $mobile)
                    <option value="{{ $mobile->id }}" {{ $mobileInService->mobile_id === $mobile->id ? 'selected' : '' }}>{{ $mobile->code }} - {{ $mobile->name }} </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-type">Tipo de móvil*</label>
            <select class="form-select" name="type_id" id="for-type" required>
                @foreach($types as $id => $name)
                    <option value="{{ $id }}" {{ optional($mobileInService)->type_id === $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-o2">Oxígeno Central</label>
            <input type="text" class="form-control" name="o2" id="for-o2" value="{{ $mobileInService->o2 }}">
        </fieldset>

        <div class="form-check col-sm-2 mt-4">
            <input type="checkbox" class="form-check-input ml-3" name="status" id="for-status" {{ ($mobileInService->status) ? 'checked':''}} >
            <label class="form-check-label ml-5" for="for-status">Activo</label>
        </div>
    </div>

    <br>

    <div class="form-row">

        <fieldset class="form-group col-sm">
            <label for="for-observation">Observación</label>
            <textarea class="form-control" name="observation" id="for-observation">{{ $mobileInService->observation }}</textarea>
        </fieldset>

    </div>

    <br>

    <button class="btn btn-outline-secondary float-end ms-1" href="{{ route('samu.mobileinservice.index') }}">Cancelar</button>
    <button type="submit" class="btn btn-primary float-end">Guardar</button>

    @can('Developer')
        <!-- <br> -->
        <!-- <div class="row"> -->
            <a class="btn btn-info float-end me-1" href=" {{ route('samu.mobileinservice.location', $mobileInService) }}">
                <i class="fas fa-map-marked"></i> Ubicación
            </a>
        <!-- </div> -->
    @endcan

</form>

@endsection

@section('custom_js')

@endsection
