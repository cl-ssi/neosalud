@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Importar archivo SIRH</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.rrhh.importSirhFile') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')


    <div class="form-row">
        <fieldset class="form-group col-6">
            <label>Archivo</label>
            <input type="file" class="form-control" name="file" required >
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary mt-1 mb-4">Guardar</button>

</form>

@endsection

@section('custom_js')
<script>

</script>
@endsection