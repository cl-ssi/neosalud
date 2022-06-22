@extends('layouts.app')

@section('content')

@include('samu.nav')



<div class="row">
    <div class="col">
        <h5 class="mb-3"><i class="fas fa-ambulance"></i> Móviles en servicio y tripulación</h5>
    </div>
    <div class="col">
        <a class="btn btn-success float-end" href="{{ route('samu.mobileinservice.create') }}">
            <i class="fas fa-plus"></i> </i> Agregar móvil a turno
        </a>
    </div>
</div>

<br>

<div class="card">
    <div class="card-header">
        <h5>Turno {{ $openShift->opening_at }} {{ $openShift->type }} ({{ $openShift->statusInWord }})</h5>
    </div>
    <div class="card-body">
        @include(
            'samu.mobileinservice.partials.list', [
                'mobilesInService' => $openShift->mobilesInService->sortBy('position'),
                'edit' => true,
                'editLunch' => true
            ]
        )
    </div>
</div>


{{--
@if($lastShift)
    <h4>Turno {{ $lastShift->opening_at }} {{ $lastShift->type }} ({{ $lastShift->statusInWord }})</h4>
    @include(
        'samu.mobileinservice.partials.list', [
            'mobilesInService' => $lastShift->mobilesInService->sortBy('position'),
            'edit' => false,
            'editLunch' => false
        ]
    )
@endif
--}}

@endsection

@section('custom_js')

@endsection
