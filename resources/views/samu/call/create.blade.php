@extends('layouts.app')

@section('custom_js_head')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

    <style>
        #map {
            width: 100%;
            height: 400px;
        }
    </style>
@endsection

@section('content')

    @include('samu.nav')

    <h3 class="mb-3"><i class="fas fa-headset"></i> Nueva llamada
        <small class="float-right"><i class="far fa-calendar-alt"></i> Fecha de registro: {{ date('Y-m-d') }}</small>
    </h3>

    <!-- Create-->
    <form method="POST" action="{{ route('samu.call.store') }}" onkeydown="return event.key != 'Enter';">
        @csrf
        @method('POST')

        @include('samu.call.partials.message-for-script')

        @include('samu.call.form', ['call' => null])

    </form>

@endsection

@section('custom_js')
    <script>
        const API_KEY = '{{ env("API_KEY_HERE") }}';
    </script>
    {{-- TODO: Remove change imports to package.json --}}
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('/js/samu/call-form.js') }}"></script>
    <script src="{{ asset('/js/samu/call-search-location.js') }}"></script>
@endsection