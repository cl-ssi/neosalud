@extends('layouts.app')

@section('content')

@include('samu.nav')



<div class="row">
    <div class="col">
        <h3 class="mb-3"><i class="fas fa-ambulance"></i> Móviles en servicio</h3>
    </div>
    <div class="form-row">
        <a class="btn btn-primary mb-2" href="{{ route('samu.mobileinserviceinventory.templates.index') }}">
            <i class="fas fa-plus"></i> Plantillas
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
            'samu.mobileinserviceinventories.partials.list', [
                'mobilesInService' => $openShift->mobilesInService->sortBy('position'),
                'edit' => true,
                'editLunch' => true
            ]
        )
    </div>
</div>

@endsection

@section('custom_js')

@endsection
