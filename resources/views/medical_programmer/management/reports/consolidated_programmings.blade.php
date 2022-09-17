@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Consolidado de programaciones</h3>

<form method="GET" id="form" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.consolidated_programmings') }}">
    <div class="form-row">
      <fieldset class="form-group col col-md-4">
          <label for="for_id_deis">Fecha</label>
          <input type="date" class="form-control" name="date" value="{{$request->date}}">
      </fieldset>

      <div class="form-group col-md-2">
        <label for="inputEmail4">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Buscar</button>
      </div>
    </div>
</form>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Médico</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">No médico</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

  <table class="table table-sm table-bordered text-center table-striped small">
    <thead>
      <tr class="text-center">
        <th>Rut</th>
        <th>Contrato</th>
        <th>Especialidad</th>
        <th>Actividad</th>
        <th>Hrs. Asignadas</th>
        <th>Rdto/Hr</th>
        <th>Rdto/Diario</th>
        <th>Rdto/Semanal</th>
        <th>Rdto/Mensual</th>
        <th>Rdto/Anual</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($array_medic_programmings as $key1 => $array_medic_programming)
          @foreach ($array_medic_programming as $key2 => $contracts)
            @foreach ($contracts as $key3 => $specialties)
              @foreach ($specialties as $key4 => $activities)
                <tr>
                    <td>{{$key1}}</td>
                    <td>{{$key2}}</td>
                    <td>{{$key3}}</td>
                    <td>{{$key4}}</td>
                    <td>{{$activities['hours']}}</td>
                    <td>{{$activities['performance']}}</td>

                    @if($activities['performance'] != null)
                      <td>{{($activities['hours'] * $activities['performance']) }}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7}}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7 * 4}}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7 * 4 * 52}}</td>
                    @else
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    @endif
                </tr>
              @endforeach
            @endforeach
          @endforeach
        @endforeach
    </tbody>
  </table>

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  <table class="table table-sm table-bordered text-center table-striped small">
    <thead>
      <tr class="text-center">
        <th>Rut</th>
        <th>Contrato</th>
        <th>Especialidad</th>
        <th>Actividad</th>
        <th>Hrs. Asignadas</th>
        <th>Rdto/Hr</th>
        <th>Rdto/Diario</th>
        <th>Rdto/Semanal</th>
        <th>Rdto/Mensual</th>
        <th>Rdto/Anual</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($array_non_medic_programmings as $key1 => $array_medic_programming)
          @foreach ($array_medic_programming as $key2 => $contracts)
            @foreach ($contracts as $key3 => $specialties)
              @foreach ($specialties as $key4 => $activities)
                <tr>
                    <td>{{$key1}}</td>
                    <td>{{$key2}}</td>
                    <td>{{$key3}}</td>
                    <td>{{$key4}}</td>
                    <td>{{$activities['hours']}}</td>
                    <td>{{$activities['performance']}}</td>

                    @if($activities['performance'] != null)
                      <td>{{($activities['hours'] * $activities['performance']) }}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7}}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7 * 4}}</td>
                      <td>{{($activities['hours'] * $activities['performance']) * 7 * 4 * 52}}</td>
                    @else
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    @endif
                </tr>
              @endforeach
            @endforeach
          @endforeach
        @endforeach
    </tbody>
  </table>

  </div>
</div>

@endsection

@section('custom_js')

@endsection
