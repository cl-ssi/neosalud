@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-user-injured"></i> Crear Codificación de Clave</h3>

<form method="POST" action="{{ route('samu.key.store') }}">
    @csrf
    @method('POST')

    @include('samu.key.form', [
        'key' => null,
    ])

    <br>

    <a href="{{ route('samu.key.index') }}" class="btn btn-outline-secondary float-end ms-1">Cancelar</a>
    <button type="submit" class="btn btn-primary float-end">Guardar</button>

</form>

@endsection
