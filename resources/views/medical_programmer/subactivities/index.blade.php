@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Listado de Subactividades</h3>

<form method="GET" class="form-horizontal" action="{{ route('medical_programmer.subactivities.index') }}">
  <div class="input-group mb-3">
      <div class="input-group-prepend">
          <span class="input-group-text">Especialidad</span>
      </div>
      <select name="specialty_id" class="form-control" onchange="this.form.submit()">
        <option value="0" {{ $request->get('specialty_id') == 0 ? 'selected' : '' }}>Todas</option>
        @foreach($specialties as $specialty)
          <option value="{{$specialty->id}}" {{ $request->get('specialty_id') == $specialty->id ? 'selected' : '' }}>{{$specialty->specialty_name}}</option>
        @endforeach
      </select>
  </div>
</form>

<hr>

<a class="btn btn-primary mb-3" href="{{ route('medical_programmer.subactivities.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Establecimiento</th>
            <th>Especialidad/Profesión</th>
            <th>Actividad</th>
            <th>SubActividad Abrev.</th>
            <th>SubActividad</th>
            <th>Rendimiento</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $subactivities as $subactivity )
        <tr>
            <td>@if($subactivity->establishment){{$subactivity->establishment->name}}@endif</td>
            <td>@if($subactivity->specialty){{ $subactivity->specialty->specialty_name }}@endif
                @if($subactivity->profession){{ $subactivity->profession->profession_name }}@endif
            </td>
            <td>@if($subactivity->activity){{ $subactivity->activity->activity_name }}@endif</td>
            <td>{{ $subactivity->sub_activity_abbreviated }}</td>
            <td>{{ $subactivity->sub_activity_name }}</td>
            <td>{{$subactivity->performance}}</td>
            <td>
      				<a href="{{ route('medical_programmer.subactivities.edit', $subactivity) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('medical_programmer.subactivities.destroy', $subactivity) }}" class="d-inline">
      					@csrf
      					@method('DELETE')
      					<button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
      						<span class="fas fa-trash-alt" aria-hidden="true"></span>
      					</button>
      				</form>
      			</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $subactivities->links('pagination::bootstrap-4') }}

@endsection

@section('custom_js')

@endsection
