@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-blender-phone"></i> Crear Turno</h3>

<form action="{{route('samu.shift.store')}}" method="post" autocomplete="off">
    @csrf
    @method('POST')

    <div class="row g-2">
        <fieldset class="form-group col-sm-3">
            <label class="form-label fw-bold" for="for_type">
                Tipo de Turno*</b>
            </label>
            <select
                class="form-select"
                name="type"
                id="for_type"
                required
            >
                <option value="">Seleccione un tipo</option>
                <option value="Largo" {{ old('type') == 'Largo' ? 'selected' : '' }}>
                    Largo
                </option>
                <option value="Noche" {{ old('type') == 'Noche' ? 'selected' : '' }}>
                    Noche
                </option>
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label class="form-label fw-bold" for="for_opening_at">
                Apertura de turno*
            </label>
            <input
                type="datetime-local"
                class="form-control"
                name="opening_at"
                id="for_opening_at"
                value="{{ old('opening_at') }}"
                required
            >
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label class="form-label fw-bold" for="for_closing_at">
                Cierre de turno (opcional aproximado)
            </label>
            <input
                type="datetime-local"
                class="form-control"
                name="closing_at"
                id="for_closing_at"
                value="{{ old('closing_at') }}"
            >
        </fieldset>
    </div>

    </br>

    <div class="row g-2">
        <fieldset class="form-group col-sm">
            <label class="form-label fw-bold" for="for_observation">
                Observación
            </label>
            <textarea class="form-control" name="observation" id="for_observation" rows="6">{{ old('observation') }}</textarea>
        </fieldset>
    </div>

    </br>

    <a class="btn btn-outline-secondary float-end ms-1" href="{{ route('samu.shift.index') }}">Cancelar</a>
    <button type="submit" class="btn btn-primary float-end">Crear</button>

</form>

@endsection

@section('custom_js')

@endsection
