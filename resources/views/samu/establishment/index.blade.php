@extends('layouts.app')

@section('title', 'Establecimientos')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fa-solid fa-house-medical"></i> Establecimientos</h3>

<form method="POST" class="row g-2" action="{{ route('samu.establishment.store') }}">
    @csrf
    @method('POST')

    <fieldset class="col-md-12 col-12">
        <label for="establishments" class="form-label">
            {{ __('Establecimientos') }}
        </label>

        <select class="form-select" name="establishments[]" id="" multiple size="30">
            @foreach($organizations as $name => $id)
                <option value="{{ $id }}" {{ isset($establishments) && in_array($id, $establishments) ? 'selected' : '' }}>{{ $name }}</option>
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
