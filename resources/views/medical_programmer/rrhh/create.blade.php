@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Crear RRHH</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.rrhh.store') }}">
    @csrf
    @method('POST')

    <!-- <div class="row">
        <fieldset class="form-group col-4">
            <input type="checkbox" name="user_create" id="user_create" checked> Crear como usuario
        </fieldset>
    </div> -->

    <h5>Datos del usuario</h5>

    <div class="row">

        <fieldset class="form-group col-3">
            <label for="for_value">Rut</label>
            <input type="text" class="form-control" id="for_value" placeholder="Rut" name="value" required="">
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_dv">Dv</label>
            <input type="text" class="form-control" id="for_dv" placeholder="Dv" name="dv" required="">
        </fieldset>

    </div>

    <div class="row">
        <fieldset class="form-group col-4">
          <label for="for_text">Nombre</label>
          <input type="text" class="form-control" id="for_text" placeholder="" name="text" required="">
        </fieldset>

        <fieldset class="form-group col-4">
          <label for="for_fathers_family">Apellido Paterno</label>
          <input type="text" class="form-control" id="for_fathers_family" placeholder="" name="fathers_family" required="">
        </fieldset>

        <fieldset class="form-group col-4">
            <label for="for_mothers_family">Apellido Materno</label>
            <input type="text" class="form-control" id="for_mothers_family" placeholder="" name="mothers_family" required="">
        </fieldset>
    </div>

    <hr />

    <h5>Datos adicionales</h5>

    <div class="row">

        <!-- <fieldset class="form-group col col-md-2">
            <label for="for_id_deis">Id Deis</label>
            <input type="number" class="form-control" name="id_deis" id="for_id_deis">
        </fieldset>

        <fieldset class="form-group col col-md-2">
            <label for="for_cod_estab_sirh">Cod Estab SIRH</label>
            <input type="number" class="form-control" name="cod_estab_sirh" id="for_cod_estab_sirh">
        </fieldset> -->

        <fieldset class="form-group col-4">
            <label for="for_job_title">Título profesional</label>
            <input type="text" class="form-control" id="for_job_title" placeholder="" name="job_title">
        </fieldset>

        <fieldset class="form-group col-4">
            <label for="for_sis_specialty">Especialidad SIS</label>
            <input type="text" class="form-control" id="for_sis_specialty" placeholder="" name="sis_specialty">
        </fieldset>
    </div> 

    <div class="row">

        <fieldset class="form-group col">
            <label for="risk_group">Grupo de riesgo</label>
            <select name="risk_group" id="for_risk_group" class="form-control">
                <option value=""></option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_missing_condition">Ausentismo</label>
            <select name="missing_condition" id="for_missing_condition" class="form-control">
                <option value=""></option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_missing_reason">Motivo (maternales, PSGS, Comisiones de estudio)</label>
            <input type="text" class="form-control" id="for_missing_reason" name="missing_reason">
        </fieldset>

    </div>

    <!-- <div class="row">
      <div class="form-group col">
          <h4>Permisos</h4>
          <select class="selectpicker" name="permissions[]" multiple>
              @foreach($permissions as $permission)
                  <option value="{{ $permission->name }}">{{ $permission->name }}</option>
              @endforeach
          </select>
      </div>
    </div> -->

    <hr>

    <h5>Información médica</h5>

    <div class="row">
      <div class="form-group col-3">
          <h4>Especialidades</h4>
          <select id="specialties" class="selectpicker" name="specialties[]" multiple>
              @foreach($specialties as $specialty)
                  <option value="{{ $specialty->id }}" >{{ $specialty->specialty_name }}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-3">
          <h4>Especialidad Principal</h4>
          <select id="principal_specialty" name="principal_specialty">

          </select>
      </div>
    </div>

    <br>

    <div class="row">
      <div class="form-group col-3">
          <h4>Profesiones</h4>
          <select id="professions" class="selectpicker" name="professions[]" multiple>
              @foreach($professions as $profession)
                  <option value="{{ $profession->id }}">{{ $profession->profession_name }}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group col-3">
          <h4>Profesión Principal</h4>
          <select id="principal_profession" name="principal_profession">

          </select>
      </div>
    </div>

    <br />

    <!-- <div class="container">
      <div class="row">
        <div class="col-sm">
            <h4>Box</h4>
            <select class="selectpicker" name="operating_rooms[]" multiple>
                @foreach($operating_rooms as $operating_room)
                    <option value="{{ $operating_room->id }}">{{ $operating_room->description }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm">

        </div>
      </div>
    </div> -->

    <button type="submit" class="btn btn-primary">Crear</button>

</form>

@endsection

@section('custom_js')
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}"> -->

<script src='{{asset("js/jquery.rut.chileno.js")}}'></script>
<script type="text/javascript">

$(document).ready(function(){

  //especialidades
  //al modificar especialidades
  $('#services').on('change', function() {
    $('#principal_service').empty();
    $.each($("#services option:selected"), function(){
        optionText = $(this).text();
        optionValue = $(this).val();
        $('#principal_service').append('<option value="'+optionValue+'">'+optionText+'</option>');
    });
  });


  //especialidades
  //al modificar especialidades
  $('#specialties').on('change', function() {
    $('#principal_specialty').empty();
    $.each($("#specialties option:selected"), function(){
        optionText = $(this).text();
        optionValue = $(this).val();
        $('#principal_specialty').append('<option value="'+optionValue+'">'+optionText+'</option>');
    });

  });


  //profesiones
  //al modificar especialidades
  $('#professions').on('change', function() {
    $('#principal_profession').empty();
    $.each($("#professions option:selected"), function(){
        optionText = $(this).text();
        optionValue = $(this).val();
        $('#principal_profession').append('<option value="'+optionValue+'">'+optionText+'</option>');
    });
  });

});

</script>
<!-- <script src="{{ asset('js/bootstrap-select.min.js') }}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('js/defaults-es_CL.min.js') }}"></script>
@endsection
