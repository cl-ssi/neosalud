@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Editar Subactividad</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.subactivities.update', $subactivity) }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <fieldset class="col-6 col-md-3">
            <label for="for_establishment_id">Establecimiento</label>
            <select name="establishment_id" id="for_establishment_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                @foreach($organizations as $organization)
                    <option value="{{$organization->id}}" {{ $organization->id == $subactivity->establishment_id ? 'selected' : '' }}>{{$organization->name}}</option>
                @endforeach
            </select>
        </fieldset>

      @if($subactivity->specialty)
        <fieldset class="form-group col">
          <label for="for_specialty_id">Especialidad</label>
          <select name="specialty_id" id="law" class="form-control" disabled>
            <option value=""></option>
            @foreach ($specialties as $key => $specialty)
            <option value="{{$specialty->id}}" {{ $specialty->id == $subactivity->specialty_id ? 'selected' : '' }}>{{$specialty->specialty_name}}</option>
            @endforeach
          </select>
        </fieldset>
      @endif

      @if($subactivity->profession)
        <fieldset class="form-group col">
          <label for="for_profession_id">Profesión</label>
          <select name="profession_id" id="law" class="form-control" disabled>
            <option value=""></option>
            @foreach ($professions as $key => $profession)
            <option value="{{$profession->id}}" {{ $profession->id == $subactivity->profession_id ? 'selected' : '' }}>{{$profession->profession_name}}</option>
            @endforeach
          </select>
        </fieldset>
      @endif

      <fieldset class="form-group col">
        <label for="for_activity_id">Actividad</label>
        <select name="activity_id" id="for_activity_id" class="form-control" disabled>
          <option value=""></option>
          @foreach ($activities as $key => $activity)
          <option value="{{$activity->id}}" {{ $activity->id == $subactivity->activity_id ? 'selected' : '' }}>{{$activity->activity_name}}</option>
          @endforeach
        </select>
      </fieldset>

    </div>

    <div class="row">
        <fieldset class="form-group col-3">
          <label for="for_sub_activity_abbreviated">Abreviado</label>
          <input type="text" class="form-control" id="for_sub_activity_abbreviated" placeholder="" name="sub_activity_abbreviated" value="{{$subactivity->sub_activity_abbreviated}}">
        </fieldset>

        <fieldset class="form-group col-3">
          <label for="for_sub_activity_name">Nombre</label>
          <input type="text" class="form-control" id="for_sub_activity_name" placeholder="" name="sub_activity_name" required value="{{$subactivity->sub_activity_name}}">
        </fieldset>

        <fieldset class="form-group col-4">
          <label for="for_sub_activity_description">Descripción</label>
          <input type="text" class="form-control" id="for_sub_activity_description" placeholder="" name="sub_activity_description" value="{{$subactivity->sub_activity_description}}">
        </fieldset>

        <fieldset class="form-group col">
          <label for="for_performance">Rendimiento</label>
          <input type="text" class="form-control" id="for_performance" placeholder="" name="performance" value="{{$subactivity->performance}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $activity->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection
