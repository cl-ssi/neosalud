@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Datos de la llamada</h3>

<!-- Edit --> 
<form method="POST" action="{{ route('samu.call.update', $call) }}">
    @csrf
    @method('PUT')

    @include('samu.call.form', ['call' => $call])
</form>


<br>

<div class="card">
    <div class="card-body">

    @switch($call->class_call)
        @case('OT')
            @include('samu.ot.edit', ['call' => $call])
            @break

        @default
            @include('samu.qtc.edit', ['call' => $call])
            @break
    @endswitch

    </div>
</div>

<br>

@endsection

@section('custom_js')

@endsection