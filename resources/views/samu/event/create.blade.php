@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    @if(request()->routeIs('samu.event.create'))
        <i class="fas fa-car-crash"></i>
        Nuevo cometido {{ $nextCounter }}
        @if($call)
            - Relacionada con la llamada ID: {{ $call->id }}
        @endif
    @else
        <i class="fas fa-car-crash"></i>
        @if($event)
            Duplicando cometido Nº {{ $event->id }}, con nuevo Nº {{ $nextCounter }}
        @endif
    @endif
</h3>

@include('samu.call.partials.associated-calls', ['call' => ($event) ? $event->call : $call])

<form
    method="post"
    action="{{ request()->routeIs('samu.event.create')
        ? route('samu.event.store', $call)
        : route('samu.event.store.duplicate', $event) }}"
    onkeydown="return event.key != 'Enter';"
>

    @csrf
    @method('POST')

    @include('samu.event.form', [
        'event'             => $event,
        'call'              => $call,
        'keys'              => $keys,
        'shift'             => $shift,
        'inputType'         => $inputType,
        'timestampFormat'   => $timestampFormat,
    ])

    <button type="submit" class="btn btn-primary">
        @if(request()->routeIs('samu.event.create'))
            <i class="fas fa-save"></i> Guardar
        @else
            <i class="fas fa-copy"></i> Duplicar
        @endif
    </button>

    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">
        Cancelar
    </a>

</form>

<br>

@endsection

@section('custom_js')

@endsection