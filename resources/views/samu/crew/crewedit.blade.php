@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    <i class="fa-solid fa-calendar-day"></i> Editar Fecha
</h3>

<form method="POST" class="form-horizontal" action="{{ route('samu.mobileinservice.crewupdate', $mobileCrew) }}">
    @csrf
    @method('PUT')

    <div class="row g-2 mb-3">

        <fieldset class="form-group col-sm-6">
            <label for="user_id">Nombre</label>
            <input
                type="text"
                class="form-control"
                value="{{ $mobileCrew->user->officialFullName }}"
                id="user_id"
                disabled
                readonly
            >
        </fieldset>

        <fieldset class="form-group col-sm-6">
            <label for="job_type_id">Función</label>
            <input
                type="text"
                class="form-control"
                value="{{ $mobileCrew->jobType->name }}"
                id="job_type_id"
                disabled
                readonly
            >
        </fieldset>

    </div>

    <div class="row g-2">

        <fieldset class="form-group col-sm-6">
            <label for="assumes_at">Asume</label>
            <input
                type="datetime-local"
                class="form-control"
                name="assumes_at"
                value="{{ old('assumes_at', optional($mobileCrew->assumes_at)->format('Y-m-d\TH:i') ) }}"
                id="assumes_at"
            >
        </fieldset>

        <fieldset class="form-group col-sm-6">
            <label for="leaves_at">Se retira</label>
            <input
                type="datetime-local"
                class="form-control"
                name="leaves_at"
                value="{{ old('leaves_at', optional($mobileCrew->leaves_at)->format('Y-m-d\TH:i') )}}"
                id="leaves_at"
            >
        </fieldset>

    </div>

    <br>

    <div class="form-row">
        <button type="submit" class="btn btn-primary float-end">
            <i class="fas fa-plus"></i> Guardar
        </button>
    </div>

</form>


@endsection


@section('custom_js')

@endsection
