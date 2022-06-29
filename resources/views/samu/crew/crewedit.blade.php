@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fa-solid fa-calendar-day"></i> Editar Fecha</h3>

<form method="POST" class="form-horizontal" action="{{ route('samu.mobileinservice.crewupdate', $mobileCrew) }}">
    @csrf
    @method('PUT')

    <div class="row g-2">

        <fieldset class="form-group col-sm-6">
			      <label for="user_id">Nombre</label>
			      <input type="text" class="form-control"value="{{ $mobileCrew->user->officialFullName }}" disabled readonly>
        </fieldset>

        <fieldset class="form-group col-sm-6">
      			<label for="job_type_id">Función</label>
      			<input type="text" class="form-control" value="{{ $mobileCrew->jobType->name }}" disabled readonly>
        </fieldset>

    </div>

    <div class="row g-2">

        <fieldset class="form-group col-sm-6">
  			    <label>Asume:</label>
            <input type="datetime-local" class="form-control" name="assumes_at" value="{{ $mobileCrew->assumes_at->format('Y-m-d\TH:i:s') }}" >
        </fieldset>

        <fieldset class="form-group col-sm-6">
            <label>Se retira:</label>
            <input type="datetime-local" class="form-control" name="leaves_at"  value="{{ optional($mobileCrew->leaves_at)->format('Y-m-d\TH:i:s') }}">
        </fieldset>

    </div>

    <br>

    <div class="form-row">
        <button type="submit" class="btn btn-primary float-end">Guardar</button>
    </div>

</form>


@endsection


@section('custom_js')

@endsection
