@extends('layouts.app')

@section('content')

@include('medical_programmer.nav')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css">

<h3 class="mb-3">Listado Visadores</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.rrhh.add_visator') }}">
    @csrf
    @method('POST')

    <div class="row">
        <fieldset class="col-3">
            <label for="for_user_id">Funcionario</label>
            <select name="user_id" id="for_user_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->OfficialFullName}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="col-3">
            <label for="for_permission">Permiso</label>
            <select name="permission" id="for_permission" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
                <option value=""></option>
                <option value="Mp: Proposal - Jefe de CAE Médico">Jefe de CAE médico</option>
                <option value="Mp: Proposal - Jefe de CAE No médico">Jefe de CAE No médico</option>
                <option value="Mp: Proposal - Subdirección Médica">Subdirección médica</option>
                <option value="Mp: Proposal - Subdirección DGCP">Subdirección DGCP</option>
            </select>
        </fieldset>

        <fieldset class="col-3">
            <br>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
    </div>

    

</form>

<hr>

<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Permiso</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users_jefe_cae_médico as $user)
        <tr>
            <td>{{ $user->OfficialFullName }}</td>
            <td>Jefe de CAE médico</td>
            <td>
                <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_visator', [$user, 'Mp: Proposal - Jefe de CAE Médico']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        @foreach($users_jefe_cae_no_medico as $user)
        <tr class="table-active">
            <td>{{ $user->OfficialFullName }}</td>
            <td>Jefe de CAE No médico</td>
            <td>
                <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_visator', [$user, 'Mp: Proposal - Jefe de CAE No médico']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        @foreach($users_subdireccion_medica as $user)
        <tr>
            <td>{{ $user->OfficialFullName }}</td>
            <td>Subdirección médica</td>
            <td>
                <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_visator', [$user, 'Mp: Proposal - Subdirección Médica']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

        @foreach($users_subdireccion_dgcp as $user)
        <tr class="table-active">
            <td>{{ $user->OfficialFullName }}</td>
            <td>Subdirección DGCP</td>
            <td>
                <form method="POST" action="{{ route('medical_programmer.rrhh.destroy_visator', [$user, 'Mp: Proposal - Subdirección DGCP']) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                        <span class="fas fa-trash-alt" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('custom_js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js"></script>
@endsection
