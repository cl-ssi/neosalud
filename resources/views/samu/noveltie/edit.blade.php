@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Editar novedad ID: {{ $noveltie->id }}</h3>

<form method="post" action="{{ route('samu.noveltie.update', $noveltie) }}">
    @csrf
    @method('PUT')

    @include('samu.noveltie.partials.form', [
        'noveltie' => $noveltie
    ])

    <br>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary float-end ms-1">Cancelar</a>
    <button type="submit" class="btn btn-primary float-end">Guardar</button>


</form>

@endsection
