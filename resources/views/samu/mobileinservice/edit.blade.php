@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar móvil en servicio</h3>

<form class="row g-2" method="POST" action="{{ route('samu.mobileinservice.update', $mobileInService) }}">
    @csrf
    @method('PUT')

	@include('samu.mobileinservice.partials.form', [
        'mobileInService' => $mobileInService,
    ])

	<div class="col-12">
		<button type="submit" class="btn btn-primary">Guardar</button>
		
		<button class="btn btn-outline-secondary m-2" href="{{ route('samu.mobileinservice.index') }}">Cancelar</button>

		@can('Developer')
		<a class="btn btn-info" href="{{ route('samu.mobileinservice.location', $mobileInService) }}">
			<i class="fas fa-map-marked"></i> Ubicación
		</a>
		@endcan
	</div>
</form>

@endsection

@section('custom_js')

@endsection
