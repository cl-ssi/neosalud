@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<h3 class="mb-3">Editar Actividad Madre</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.mother_activities.update', $motherActivity) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_description">Actividad Madre</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$motherActivity->description}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $motherActivity->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection
