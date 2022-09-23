@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    <i class="fas fa-blender-phone"></i> Editar Turno {{ $shift->id }}
</h3>

<form action="{{route('samu.shift.update', $shift)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
        <div class="row g-2">
            <fieldset class="form-group col-sm-3">
                <label class="form-label fw-bold" for="for_type">
                    Tipo de Turno*
                </label>
                <select class="form-select" name="type" id="for_type" required>
                    <option value="Noche" {{ old('type', $shift->type) == 'Noche' ? 'selected' : '' }}>
                        Noche
                    </option>
                    <option value="Largo" {{ old('type', $shift->type) == 'Largo' ? 'selected' : '' }}>
                        Largo
                    </option>
                </select>
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label class="form-label fw-bold" for="for_opening_at">
                    Apertura de turno*
                </label>
                <input
                    class="form-control"
                    type="datetime-local"
                    name="opening_at"
                    id="for_opening_at"
                    value="{{ old('opening_at', optional($shift->opening_at)->format('Y-m-d\TH:i:s')) }}"
                    required>
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label class="form-label fw-bold" for="for_closing_at">
                    Cierre de turno
                </label>
                <input
                    class="form-control"
                    type="datetime-local"
                    name="closing_at"
                    id="for_closing_at"
                    value="{{ old('closing_at', optional($shift->closing_at)->format('Y-m-d\TH:i:s')) }}"
                    >
            </fieldset>

            <fieldset class="form-group col-sm-3">
                <label class="form-label fw-bold" for="for_status">
                    Estado
                </label>
                <select name="status" id="status" class="form-select" @if($openShift) disabled readonly @endif>
                    <option value="0" {{ old('status', $shift->status) == 0 ? 'selected' : '' }}>
                        Cerrado
                    </option>
                    <option value="1" {{ old('status', $shift->status) == 1 ? 'selected' : '' }}>
                        Abierto
                    </option>
                </select>
                @if($openShift)
                    <div class="form-text">Ya existe un turno abierto.</div>
                @endif
            </fieldset>
        </div>

        </br>

        <div class="row g-2">
            <fieldset class="form-group col-sm">
                <label class="form-label fw-bold" for="for_observation">
                    Observación
                </label>
                <textarea class="form-control" name="observation" id="for_observation" rows="6">{{ old('observation', $shift->observation) }}</textarea>
            </fieldset>
        </div>

        </br>

        <a class="btn btn-outline-secondary float-end ms-1" href="{{ route('samu.shift.index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary float-end">Guardar</button>
</form>


@endsection
