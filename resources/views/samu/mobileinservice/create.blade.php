@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Asigna un móvil a un turno</h3>

<form method="POST" action="{{ route('samu.mobileinservice.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col-sm-3">
            <label for="for-position">Posición salida</label>
            <input type="number" value="1" class="form-control" name="position" id="for-position">
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-mobile-id">Móvil*</label>
            <select class="form-select" name="mobile_id" id="for-mobile-id" required>
            <option></option>
                @foreach($mobiles as $mobile)
                @if ($mobile->managed == true)
                    <option value="{{ $mobile->id }}">{{ $mobile->code }} - {{ $mobile->name }}</option>
                @endif
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-type">Tipo de móvil*</label>
            <select class="form-select" name="type_id" id="for-type" required>
                <option value=""></option>
                @foreach($types as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for-o2">Oxígeno Central</label>
            <input type="text" class="form-control" name="o2" id="for-o2">
        </fieldset>

    </div>

    <br>

    <div class="form-row">

        <fieldset class="form-group col-sm">
            <label for="for-observation">Observación</label>
            <textarea class="form-control" name="observation" id="for-observation"></textarea>
        </fieldset>

    </div>

    <br>

    <a href="{{ route('samu.mobileinservice.index') }}" class="btn btn-outline-secondary float-end ms-1">Cancelar</a>
    <button type="submit" class="btn btn-primary float-end">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
