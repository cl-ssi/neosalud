@extends('layouts.app')

@section('title', 'Crear Organizaciones')

@section('content')

@canany(['Mp: user'])
    @include('medical_programmer.nav')
@endcanany

<h3 class="mb-3">Crear Organizaciones</h3>

<form method="POST" class="form-horizontal" action="{{ route('parameter.organization.store') }}">
    @csrf
    @method('POST')
    <div class="form-row">
        <fieldset class="form-group col">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name" name="name" required>
        </fieldset>

    </div>


</form>



@endsection