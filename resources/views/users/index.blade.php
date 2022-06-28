@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"><i class="fa-solid fa-magnifying-glass"></i> Buscar usuario</h1>
</div>
@isset($run)
    @livewire('user.advanced-search', compact('run'))
@else
    @livewire('user.advanced-search')
@endif


@endsection
