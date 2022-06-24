@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Buscar eventos</h3>

<form method="post" action="{{ route('samu.event.filter')}}">
    @csrf
    @method('POST')
    <div class="row g-2">
        <fieldset class="form-group col-sm-2">
            <label for="for_date">Fecha</label>
            <input type="date" class="form-control"
                name="date" id="date" value="{{ old('date') }}">
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for_key">Clave</label>
            <select class="form-select" name="key_id" >
                <option value=""></option>
                @foreach($keys as $key)
                <option value="{{ $key->id }}" {{ old('key_id') == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-4">
            <label for="for_address">Dirección</label>
            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
        </fieldset>

        <fieldset class="form-group col-sm-2">
            <label for="for_commune">Comuna</label>
            <select class="form-select" name="commune_id">
                <option value=""></option>
                @foreach($communes as $name => $id)
                <option value="{{ $id }}" {{ old('commune_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
            </select>
        </fieldset>

        <div class="form-group col-md-1">
            <label for="">&nbsp;</label>
            <button type="submit" class="form-control btn btn-primary" name="btn-search" value="true">
                <i class="fas fa-search"></i> Buscar </button>
        </div>
    </div>
</form>


@if($events->isNotEmpty())
    <hr>
    <h4>Total de registros: {{ $events->count() }}</h4>

    @include('samu.event.partials.index', ['events' => $events, 'btnDuplicate' => false])

    {{ $events->links() }}
@else
    <br>
    <div class="alert alert-warning">
        No hay eventos con esos parámetros
    </div>
@endif



@endsection

@section('custom_js')

@endsection
