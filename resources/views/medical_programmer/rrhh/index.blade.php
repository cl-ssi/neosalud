@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Listado de RRHH</h3>

<a class="btn btn-primary mb-3" href="{{ route('medical_programmer.rrhh.create') }}">
    <i class="fas fa-plus"></i> Agregar nuevo
</a>

<form>
    <div class="row">
        <div class="form-group col-3">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="{{$request->get('name')}}">
        </div>
        <div class="form-group col-3">
            <label>Rut</label>
            <input type="number" class="form-control" name="rut" value="{{$request->get('rut')}}">
        </div>
        <div class="form-group col-2">
            <label>&nbsp;</label>
            <button type="submit" class="form-control btn btn-primary" id="button">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </div>
</form>

<hr>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>RUT</th>
            <th>DV</th>
            <th>Nombre</th>
            <!-- <th>Apellido Paterno</th>
            <th>Apellido Materno</th> -->
            <!-- <th>Función</th> -->
            <th>Prof/Espec</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $rrhh as $user)
        <tr>
            <td>{{ $user->IdentifierRun->value }}</td>
            <td>{{ $user->IdentifierRun->dv }}</td>
            <td>{{ $user->OfficialFullName }}</td>
            <!-- <td>{{ $user->fathers_family }}</td>
            <td>{{ $user->mothers_family }}</td> -->
            <!-- <td>{{ $user->job_title }}</td> -->
            <td nowrap>
                <!-- @foreach ($user->specialties as $key => $specialty)
                    {{$specialty->specialty_name}},
                    @if ($key == 2)
                        @break
                    @endif
                @endforeach
                @foreach ($user->professions as $key => $profession)
                    {{$profession->profession_name}},
                    @if ($key == 2)
                        @break
                    @endif
                @endforeach
                -->
                @foreach($user->practitioners as $key => $practitioner)
                    @if($practitioner->specialty)
                        {{$practitioner->specialty->specialty_name}},
                    @endif
                    @if($practitioner->profession)
                        {{$practitioner->profession->profession_name}},
                    @endif
                    @if ($key == 2)
                        @break
                    @endif
                @endforeach
            </td>
            <td>
      				<a href="{{ route('medical_programmer.rrhh.edit', $user) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('medical_programmer.rrhh.destroy', $user) }}" class="d-inline">
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

{{ $rrhh->links('pagination::bootstrap-4') }}

@endsection

@section('custom_js')

@endsection
