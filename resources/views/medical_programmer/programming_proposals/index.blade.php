@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Listado de fichas de programación</h3>

<div class="alert alert-info" role="alert">
  Solo administradores del sistema y jefes de unidad podrán revisar información en esta opción.
</div>

<a class="btn btn-primary mb-3" href="{{ route('medical_programmer.programming_proposal.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<form method="GET" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.index') }}">
  <div class="row">

        {{-- <div class="col-8">
          @livewire('medical_programmer.select-med-prog-employee',['type'         => $request->type,
                                                                   'specialty_id' => $request->specialty_id,
                                                                   'profession_id'=> $request->profession_id,
                                                                   'user_id'      => $request->user_id,
                                                                   'contract_enable' => 0,
                                                                   'required_enabled' => 0]) 
            
        </div> --}}
        <div class="col-3">
            <label>Nombre</label>
            <input type="text" class="form-control" name="name" value="{{$request->get('name')}}">
        </div>
        <div class="col-2">
            <label for="for_type">.</label>
            <button type="submit" class="btn btn-primary form-control" id="button"><i class="fas fa-search"></i> Buscar</button>
        </div>
  </div>
</form>

<hr>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>ID</th>
            <th>F.Solicitud</th>
            <th>Tipo</th>
            <th>Empleado</th>
            <th>Contrato</th>
            <th>Especialidad/Profesión</th>
            <th>F.Inicio</th>
            <th>F.Término</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @foreach($programmingProposals as $programmingProposal)
        <tr>
          <td>{{$programmingProposal->id}}</td>
          <td>{{$programmingProposal->request_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->type}}</td>
          <td>{{$programmingProposal->user->OfficialFullName}}</td>
          <td>{{$programmingProposal->contract->law}} - {{$programmingProposal->contract->weekly_hours}}hrs</td>
          <td>
            @if($programmingProposal->specialty){{$programmingProposal->specialty->specialty_name}}@endif
            @if($programmingProposal->profession){{$programmingProposal->profession->profession_name}}@endif
          </td>
          <td>{{$programmingProposal->start_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->end_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->status}}</td>
          <td>
            <a href="{{ route('medical_programmer.programming_proposal.edit', $programmingProposal) }}"
              class="btn btn-sm btn-outline-secondary">
              <span class="fas fa-edit" aria-hidden="true"></span>
            </a>
            <form method="POST" action="{{ route('medical_programmer.programming_proposal.destroy', $programmingProposal) }}" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                <span class="fas fa-trash-alt" aria-hidden="true"></span>
              </button>
            </form>
          </td>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>

{{ $programmingProposals->links('pagination::bootstrap-4') }}


@endsection

@section('custom_js')

@endsection
