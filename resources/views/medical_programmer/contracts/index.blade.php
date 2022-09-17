@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3> Listado de Contratos</h3>
<a class="btn btn-primary mb-2" href="{{ route('medical_programmer.contracts.create') }}">
    <i class="fas fa-plus"></i> Agregar nuevo
</a>

<form>
    <div class="form-row">
        <div class="form-group col-md-4 col-6">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="{{$request->get('name')}}">
        </div>
        <div class="form-group col-md-3 col-6">
            <label>Rut</label>
            <input type="number" class="form-control" name="rut" value="{{$request->get('rut')}}">
        </div>
        <div class="form-group col-md-3 col-6">
            <label>Año contrato</label>
            <select name="year" id="for_year" class="form-control">
                <option value="2020" {{ $request->get('year') == "2020" ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ $request->get('year') == "2021" ? 'selected' : '' }}>2021</option>
                <option value="2022" {{ $request->get('year') == "2022" ? 'selected' : '' }}>2022</option>
                <option value="2023" {{ $request->get('year') == "2023" ? 'selected' : '' }}>2023</option>
                <option value="2024" {{ $request->get('year') == "2024" ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ $request->get('year') == "2025" ? 'selected' : '' }}>2025</option>
            </select>
        </div>
        <div class="form-group col-md-2 col-6">
            <label>&nbsp;</label>
            <button type="submit" class="form-control btn btn-primary" id="button">
                <i class="fas fa-search"></i> Buscar
            </button>
        </div>
    </div>
</form>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Trabajador</th>
            <th>Especialista</th>
            <th>Ley</th>
            <th>Contrato Correlativo</th>
            <th>Horas Semanales</th>
            <th>Servicio</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $contracts as $contract )
        <tr>
            <td>@if($contract->user){{ $contract->user->IdentifierRun->value }}@endif</td>
            <td>@if($contract->user){{ $contract->user->OfficialFullName }}@endif</td>
            <td>{{ $contract->law }}</td>
            <td>{{ $contract->contract_id }}</td>
            <td>{{ $contract->weekly_hours }}</td>
            <td>{{ $contract->service->service_name }}</td>
            <td>
      				<a href="{{ route('medical_programmer.contracts.edit', $contract) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('medical_programmer.contracts.destroy', $contract) }}" class="d-inline">
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

{{ $contracts->links('pagination::bootstrap-4') }}

@endsection

@section('custom_js')

@endsection
