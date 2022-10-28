@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Registro de novedades y reportes</h3>

@include('samu.noveltie.partials.create')

@endsection