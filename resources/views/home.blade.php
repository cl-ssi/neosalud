@extends('layouts.app')

@section('content')

<div class="h-100 p-5 bg-light border rounded-3">
    <h2>Portal interno del {{ env('APP_SS') }}</h2>
    <p>Bienvenido NeoSalud, portal de salud de la región de Tarapacá.<br> 
    Acá encontrarás la información que esté disponible para tí.</p>
    <button class="btn btn-outline-secondary" type="button">Example button</button>
</div>

@endsection