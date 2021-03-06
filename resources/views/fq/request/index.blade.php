@extends('fq.app')

@section('title', 'FQ - Solicitudes')

@section('content')

<br>

<h5>Solicitudes Pendientes</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th></th>
                <th style="width: 10%">Fecha de Solicitud</th>
                <th style="width: 8%">Estado</th>
                <th>Motivo de Solicitud</th>
                <th>Especialidad</th>
                <th>Observación</th>
                <th style="width: 4%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($pending_reqs as $fqRequest)
            <tr>
                <td class="text-center">
                    @if($fqRequest->status == 'pending')
                      <i class="fas fa-clock fa-lg"></i>
                    @endif
                    @if($fqRequest->status == 'complete')
                      <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                    @endif
                </td>
                <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $fqRequest->StatusValue }}</td>
                <td>{{ $fqRequest->NameValue }}<br>
                    @if($fqRequest->requestFiles->count() > 0)
                      <i class="fas fa-paperclip"></i>
                    @endif
                </td>
                @if($fqRequest->name == 'specialty hours' && $fqRequest->specialties == 'other')
                <td>{{ $fqRequest->SpecialtiesValue }} / {{ $fqRequest->OtherSpecialtiesValue }}</td>
                @else
                <td>{{ $fqRequest->SpecialtiesValue }}</td>
                @endif
                <td>{{ $fqRequest->observation_patient }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary btn-sm"
                        data-toggle="modal" data-target="#exampleModal-{{ $fqRequest->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    @include('fq.request.modals.view_request')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr>
<h5>Solicitudes Atendidas</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th></th>
                <th style="width: 10%">Fecha de Solicitud</th>
                <th style="width: 8%">Estado</th>
                <th>Motivo de Solicitud</th>
                <th>Especialidad</th>
                <th>Observación</th>
                <th style="width: 4%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reqs as $fqRequest)
            <tr>
                <td class="text-center">
                    @if($fqRequest->status == 'pending')
                      <i class="fas fa-clock fa-lg"></i>
                    @endif
                    @if($fqRequest->status == 'complete')
                      <i class="fas fa-check-circle fa-lg" style="color: green"></i>
                    @endif
                </td>
                <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $fqRequest->StatusValue }}</td>
                <td>{{ $fqRequest->NameValue }}<br>
                    @if($fqRequest->requestFiles->count() > 0)
                      <i class="fas fa-paperclip"></i>
                    @endif
                </td>
                <td>{{ $fqRequest->SpecialtiesValue }}</td>
                <td>{{ $fqRequest->observation_patient }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModal-{{ $fqRequest->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    @include('fq.request.modals.view_request')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reqs->links('pagination::bootstrap-4') }}
</div>

@endsection
