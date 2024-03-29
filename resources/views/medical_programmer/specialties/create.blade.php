@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<script src="{{ asset('js/colorpicker/jscolor.js') }}"></script>

<h3 class="mb-3">Nueva Especialidad</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.specialties.store') }}">
    @csrf
    @method('POST')

    <div class="form row">
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_id_specialty">id_specialty</label>
            <input type="text" class="form-control" id="for_id_specialty" name="id_specialty" required>
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_id_sigte">id Sigte</label>
            <input type="text" class="form-control" id="for_id_sigte" placeholder="(opcional)" name="id_sigte">
        </fieldset>
        
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_specialty_name">Especialidad</label>
            <input type="text" class="form-control" id="for_specialty_name" placeholder="" name="specialty_name" required>
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_name">Color</label>
            <input class="form-control jscolor" name="color" value="ab2567" required="">
        </fieldset>
    </div>

    <hr>
    <fieldset class="form-group">
      <h3><label for="">Actividades Médicas</label></h3>
      <table>
        @foreach($activities as $activity)
        <tr>
          <td>
              <input class="form-check" type="checkbox" name="activity_id[]" value="{{ $activity->id }}">
          </td>
          <td>
            <label class="form-check-label">
              {{ $activity->activity_name }}
            </label>
          </td>
          <td>
              @if($activity->performance == 1)
                  <input type="text" name="performance_activity_{{$activity->id}}" class="form-control col-md-4 float-right" id="for_activity_name" placeholder="ej: 3">
              @else
                  <input type="text" name="performance_activity_{{$activity->id}}" class="form-control col-md-4 float-right" id="for_activity_name" placeholder="--" disabled>
              @endif
          </td>
        </tr>
        @endforeach
      </table>
    </fieldset>
    <hr>

    <button type="submit" class="btn btn-primary mb-4">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
