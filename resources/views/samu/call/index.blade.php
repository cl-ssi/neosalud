@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-clipboard-check"></i> Regulación de llamadas</h3>

@unless($openShift)
<div class="alert alert-warning" role="alert">
    No hay un turno abierto
</div>
@endunless

@foreach([$openShift,$lastShift] as $shift)
@unless($shift == null)

<h4 class="mb-3">Llamadas turno
    {{ optional(optional($shift)->opening_at)->format('Y-m-d H:i') }}
    ({{ optional($shift)->statusInWord }})
</h4>

@include('samu.call.partials.list', ['calls' => $shift->calls->where('classification','<>','OT')->sortByDesc('id'), 'edit' => true, 'createEvent' => false, 'triage' => false])

    @endunless
    @endforeach


    @endsection

    @section('custom_js')

    @endsection