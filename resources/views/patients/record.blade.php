@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fas fa-search"></i> Buscar Ficha de Paciente</h1>
    </div>
    @livewire('patient-advanced-search', ['mode' => 'Ficha'])
@endsection