@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col-12 col-md-11">
        <table class="table table-sm">
            <thead class="table-light">
                <tr>
                    <th>Salida</th>
                    <th>Móvil</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Tripulación</th>
                    <th>O2</th>
                    <th>Observación</th>
                    <th>Colación</th>
                </tr>
            </thead>
            @foreach($shift->mobilesInService->sortBy('position') as $mis)
            <tr class="{{ (($mis->lunch_start_at AND !$mis->lunch_end_at) OR !$mis->status) ? 'bg-secondary text-white' : '' }}">
                <td>{{ $mis->position }}</td>
                <td nowrap>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                <td>{{ optional($mis->type)->name }}</td>
                <td> {{ $mis->mis_status }}</td>
                <td>
                    @if(!$mis->status)
                    {{ $mis->observation }}
                    @else
                    @foreach($mis->currentCrew as $tripulant)
                    {{ $tripulant->officialFullName }}
                    <span class="badge bg-secondary text-white">
                        {{ $tripulant->pivot->jobType->short_name }}
                    </span>
                    @endforeach
                    @endif
                    <br>
                </td>
                <td>{{ $mis->o2 }}</td>
                <td>{{ $mis->observation }}</td>
                <td nowrap>
                    @if($mis->lunch_start_at AND !$mis->lunch_end_at)
                    {{ $mis->lunch_start_at->format('H:i')}} -
                    {{ now()->diff($mis->lunch_start_at->copy()->addMinutes('45'))->format('%I') }}"
                    @elseif($mis->lunch_end_at)
                    {{ $mis->lunch_start_at->format('H:i')}} -
                    {{ $mis->lunch_end_at->format('H:i')}} -
                    {{ $mis->lunch_start_at->diff($mis->lunch_end_at)->format('%I') }}"
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="col-12 col-md-1">
        <table class="table table-sm small">
            <tr>
                <th>Colores</th>
            </tr>
            <tr>
                <td style="background-color: #F9C8C8">Aviso de salida</td>
            </tr>
            <tr>
                <td style="background-color: #F4F3CD">Rumbo a destino</td>
            </tr>
            <tr>
                <td style="background-color: #D3DFEE">En destino</td>
            </tr>
            <tr>
                <td style="background-color: #E0D0F1">En Ruta a AP</td>
            </tr>
            <tr>
                <td style="background-color: #B2E3E6">En AP</td>
            </tr>
            <tr>
                <td style="background-color: #C3E9D9">Recepcion y Retorno a base</td>
            </tr>
            <tr>
                <td style="background-color: #B4F8C6">En base</td>
            </tr>
        </table>
    </div>
</div>

<br>

<h3 class="mb-3">
    <i class="fas fa-phone"></i> Llamadas pendientes (sin cometido asociado)
</h3>
@include('samu.call.partials.list',['calls' => $calls, 'edit' => true, 'createEvent' => true])



<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de cometidos abiertos</h3>

@include('samu.event.partials.index', ['events' => $open_events, 'btnDuplicate' => true])

<!-- <h3 class="mb-3"><i class="fas fa-eye"></i> Listado de cometidos cerrados de hoy</h3> -->

{{-- @include('samu.event.partials.index', ['events' => $events_today ]) --}}

<!-- <h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de cometidos de ayer</h3> -->

{{-- @include('samu.event.partials.index', ['events' => $events_yesterday]) --}}


@endsection

@section('custom_js')

@endsection