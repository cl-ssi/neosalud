@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-blender-phone"></i> Editar Turno</h3>

<form action="{{route('samu.shift.update', $shift)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
        <div class="row g-2">
            <fieldset class="form-group col-sm-3">
                <label for="for_type"><b>Tipo de Turno*</b> </label>
                <select class="form-select" name="type" id="for_type" required>
                    <option value="Noche" {{($shift->type=='Noche')?'selected':''}}>Noche</option>
                    <option value="Largo" {{($shift->type=='Largo')?'selected':''}}>Largo</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="for_opening_at"><b> Apertura de turno*</b> </label>
                <input type="datetime-local" class="form-control" name="opening_at" id="for_opening_at" value="{{ $shift->opening_at->format('Y-m-d\TH:i:s') }}" required>
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="for_closing_at"><b> Cierre de turno</b> </label>
                <input type="datetime-local" class="form-control" name="closing_at" id="for_closing_at" value="{{ optional($shift->closing_at)->format('Y-m-d\TH:i:s') }}">
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label for="for_status"><b>Estado</b></label>
                <select name="status" id="status" class="form-select" @if($openShift) disabled readonly @endif>
                    <option value="0" {{ ($shift->status === 0) ? 'selected' : '' }}>Cerrado</option>
                    <option value="1" {{ ($shift->status === 1) ? 'selected' : '' }}>Abierto</option>
                </select>
                @if($openShift)
                <div class="form-text">Ya existe un turno abierto.</div>
                @endif
            </fieldset>
        </div>

        </br>

        <div class="row g-2">
            <fieldset class="form-group col-sm">
                <label for="for_observation"><b> Observación</b> </label>
                <textarea class="form-control" name="observation" id="for_observation" rows="6">{{ $shift->observation }}</textarea>
            </fieldset>
        </div>

        </br>

        <a class="btn btn-outline-secondary float-end ms-1" href="{{ route('samu.shift.index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary float-end">Guardar</button>
</form>


@endsection
