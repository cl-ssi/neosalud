@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Nueva Subactividad</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.subactivities.store') }}">
  @csrf
  @method('POST')

    <div class="form-row">
        <fieldset class="col-3">
            <label for="for_establishment_id">Establecimiento</label>
            <select name="establishment_id" id="for_establishment_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                @foreach($organizations as $organization)
                    <option value="{{$organization->id}}">{{$organization->name}}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    @livewire('medical_programmer.specialty-activities-selection',compact('specialties','professions','activities'))

    <div class="row">
        <fieldset class="form-group col-3">
          <label for="for_sub_activity_abbreviated">Abreviado</label>
          <input type="text" class="form-control" id="for_sub_activity_abbreviated" placeholder="" name="sub_activity_abbreviated">
        </fieldset>

        <fieldset class="form-group col-3">
          <label for="for_sub_activity_name">Nombre</label>
          <input type="text" class="form-control" id="for_sub_activity_name" placeholder="" name="sub_activity_name" required>
        </fieldset>

        <fieldset class="form-group col-3">
          <label for="for_sub_activity_description">Descripción</label>
          <input type="text" class="form-control" id="for_sub_activity_description" placeholder="" name="sub_activity_description">
        </fieldset>

        <fieldset class="form-group col-3">
          <label for="for_performance">Rendimiento</label>
          <input type="text" class="form-control" id="for_performance" placeholder="" name="performance">
        </fieldset>
    </div>

  <button type="submit" class="btn btn-primary mb-4">Guardar</button>

</form>

@endsection

@section('custom_js')

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>

@endsection
