@extends('layouts.app')

@section('content')

@include('samu.nav')

<h4 class="mb-3 mt-3">
    <div class="row">
        <div class="col">
            <i class="fas fa-book"></i> Novedades del turno
            {{ optional(optional($openShift)->opening_at)->format('Y-m-d H:i') }}
            ({{ optional($openShift)->statusInWord }})
        </div>
        <div class="col text-end">
            <a href="{{ route('samu.noveltie.create') }}" class="btn btn-primary">
                Crear Novedad
            </a>
        </div>
    </div>

</h4>

@include('samu.noveltie.partials.list', ['novelties' => $openShift->novelties ])

<h4 class="mb-3"><i class="fas fa-book"></i> Novedades del turno
    {{ optional(optional($lastShift)->opening_at)->format('Y-m-d H:i') }}
    ({{ optional($lastShift)->statusInWord }})</h4>

@include('samu.noveltie.partials.list', ['novelties' => $lastShift->novelties ])

@endsection

@section('custom_js')

@endsection
