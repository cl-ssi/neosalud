@extends('layouts.app')

@section('title', 'Comunas')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fa-solid fa-map-pin"></i> Comunas</h3>

<form method="POST" class="row g-2" action="{{ route('samu.commune.store') }}">
    @csrf
    @method('POST')

    <fieldset class="col-md-12 col-12">
        <label for="communes" class="form-label">
            {{ __('Comunas') }}
        </label>

        <select class="form-select" name="samuCommunes[]" id="" multiple size="30">
            @foreach($communes as $name => $id)
                <option value="{{ $id }}" {{ isset($samuCommunes) && in_array($id, $samuCommunes) ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>

        @error('establishments')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </fieldset>

    <div class="col-12">
        <button  class="btn btn-primary float-end" type="submit">{{ __('Guardar') }}</button>
    </div>

</form>





@endsection
