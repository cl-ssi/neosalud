@extends('layouts.app')
@section('content')
    @include('labs.nav')
    <div class="container">
        <h1>Tiempo Promedio entre Recepción y Resultado</h1>

        @if ($averageTime)
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-3">Promedio de Tiempo: {{ $averageTime->average_time }}</h4>
                </div>
            </div>
        @else
            <div class="alert alert-info" role="alert">
                No hay suficientes datos para calcular el tiempo promedio.
            </div>
        @endif
    </div>
@endsection
