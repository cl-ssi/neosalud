@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Funcionarios pendientes</h3>

<!-- <form method="GET" id="form" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.consolidated_programmings') }}">
    <div class="form-row">
      <fieldset class="form-group col col-md-4">
          <label for="for_id_deis">Fecha</label>
          <input type="date" class="form-control" name="date">
      </fieldset>

      <div class="form-group col-md-2">
        <label for="inputEmail4">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Buscar</button>
      </div>
    </div>
</form> -->

<table class="table table-sm table-bordered small text-uppercase">
    <thead>
        <tr>
            <th>Funcionario</th>
            <th>Total propuestas</th>
            <th>Propuestas confirmadas</th>
            <th>Propuestas no confirmadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($programmedPractitioners as $key => $programmedPractitioner)
          <tr>
              <td>{{$programmedPractitioner->OfficialFullName}}</td>
              <td>{{$programmedPractitioner->programmingProposals->count()}}</td>
              <td>{{$programmedPractitioner->programmingProposals->where('status','Confirmado')->count()}}</td>
              <td>{{$programmedPractitioner->programmingProposals->where('status','!=','Confirmado')->count()}}</td>
          </tr>
        @endforeach

        @foreach ($pendingPractitioners as $key => $pendingPractitioner)
          <tr>
              <td>{{$pendingPractitioner->OfficialFullName}}</td>
              <td>{{$pendingPractitioner->programmingProposals->count()}}</td>
              <td>{{$pendingPractitioner->programmingProposals->where('status','Confirmado')->count()}}</td>
              <td>{{$pendingPractitioner->programmingProposals->where('status','!=','Confirmado')->count()}}</td>
          </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('custom_js')

@endsection
