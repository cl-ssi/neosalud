@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Crear un móvil en servicio en el turno</h3>

<form class="row g-2" method="POST" action="{{ route('samu.mobileinservice.store') }}">
    @csrf
    @method('POST')

    @include('samu.mobileinservice.partials.form', [
        'mobileInService' => null,
    ])

    <div class="col-12">
		<button type="submit" class="btn btn-primary">Guardar</button>

		<button class="btn btn-outline-secondary m-2" href="{{ route('samu.mobileinservice.index') }}">
            Cancelar
        </button>
	</div>

</form>

@endsection

@section('custom_js')

@endsection
