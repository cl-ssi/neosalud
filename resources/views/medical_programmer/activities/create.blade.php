@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Nueva Actividad</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.activities.store') }}">
  @csrf
  @method('POST')

  <div class="form-row">
    <fieldset class="form-group col-4 col-md-4">
      <label for="for_id_actividad">id_actividad</label>
      <input type="text" class="form-control" id="for_id_actividad" placeholder="" name="id_activity" required>
    </fieldset>

    <fieldset class="form-group col-8 col-md-4">
            <label for="for_process_id">Proceso</label>
            <select name="process_id" id="for_process_id" class="form-control">
              <option value="">--</option>
              @foreach ($processes as $key => $process)
                <option value="{{$process->id}}">{{$process->name}}</option>
              @endforeach
            </select>
        </fieldset>

    <fieldset class="form-group col-8 col-md-4">
      <label for="for_activity_name">Actividad Madre</label>
      <select name="mother_activity_id" id="law" class="form-control">
        <option value="">--</option>
        @foreach ($motherActivities as $key => $motherActivity)
        <option value="{{$motherActivity->id}}">{{$motherActivity->description}}</option>
        @endforeach
      </select>
    </fieldset>

    <fieldset class="form-group col-12 col-md-4">
      <label for="for_activity_type_id">Tipo de actividad</label>
      <select name="activity_type_id" id="for_activity_type_id" class="form-control activity" required>
        <option value="">Seleccionar Tipo de Actividad</option>
        @foreach ($activityTypes as $key => $activityType)
        <option value="{{$activityType->id}}" id="{{$activityType->name}}">{{$activityType->name}}</option>
        @endforeach
      </select>
    </fieldset>



  </div>

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-4">
          <label for="for_activity_name">Actividad</label>
          <input type="text" class="form-control" id="for_activity_name" placeholder="" name="activity_name" required>
        </fieldset>

        <fieldset class="form-group col-6 col-md-4">
          <label for="for_description">Descripción</label>
          <input type="text" class="form-control" id="for_description" placeholder="" name="description" required>
        </fieldset>

        <fieldset class="form-group col-4 col-md-1">
          <label for="for_performance">Rendimiento</label>
          <select name="performance" id="for_performance" class="form-control activity">
            <option value="1">R</option>
            <option value="0">NR</option>
          </select>
        </fieldset>

        <fieldset class="form-group col-4 col-md-1">
          <label for="for_performance">Programable</label>
          <select name="programmable" id="for_programmable" class="form-control activity">
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </fieldset>

        <div class="form-group">
          <label>&nbsp;</label>
          <button type="submit" class="form-control btn btn-primary">Guardar</button>
        </div>
    </div>

</form>

@endsection

@section('custom_js')

@endsection
