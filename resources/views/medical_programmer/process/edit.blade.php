@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Editar Proceso</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.process.update', $process) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_description">Nombre</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="name" required value="{{$process->name}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $process->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection
