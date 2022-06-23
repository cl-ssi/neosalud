@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Registro de novedades y reportes</h3>

@if($openShift OR old('detail'))
    @include('samu.noveltie.partials.create')
@endif

<h4 class="mb-3 mt-3"><i class="fas fa-book"></i> Novedades del turno
    {{ optional(optional($openShift)->opening_at)->format('Y-m-d H:i') }}
    ({{ optional($openShift)->statusInWord }})</h4>

@include('samu.noveltie.partials.list', ['novelties' => $openShift->novelties ])

<h4 class="mb-3"><i class="fas fa-book"></i> Novedades del turno
    {{ optional(optional($lastShift)->opening_at)->format('Y-m-d H:i') }}
    ({{ optional($lastShift)->statusInWord }})</h4>

@include('samu.noveltie.partials.list', ['novelties' => $lastShift->novelties ])

@endsection

@section('custom_js')

@endsection
