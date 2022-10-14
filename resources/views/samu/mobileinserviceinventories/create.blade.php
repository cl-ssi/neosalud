@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Crear un inventario</h3>

<div class="card-body">
<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th>Turno</th>
                <th>Movil</th>
                <th>Posición</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>O2 central</th>
                <th>Observación</th>
            </tr>

            <tr>
                <td>Turno {{ $mis->shift->opening_at }} {{ $mis->shift->type }} ({{ $mis->shift->statusInWord }})</td>
                <td><b>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</b></td>
                <td>{{ $mis->position }}</td>
                <td>{{ optional($mis->type)->name }}</td>
                <td>{{ $mis->status ? 'Activo' : 'Inactivo'  }}</td>
                <td>{{ $mis->o2 }}</td>
                <td>{{ $mis->observation }}</td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<h4>Medicinas e Insumos</h4>

<form method="POST" action="{{ route('samu.mobileinserviceinventory.details.store' , $mis) }}">
    @csrf

    <!-- <fieldset class="border p-2">
        <label for="">Fecha de recepción</label>
        <input type="date" name="reception_date">
    </fieldset> -->

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th width="20%">Cantidad</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="mobile_in_service_id" value="{{$mis->id}}">
                @foreach($medicines as $medicine)
                    <tr>
                        <td>MEDICINA</td>
                        <td>{{$medicine->name}}</td>
                        <td><input class="form-control" type="text" name="medicines_values[]">
                            <input class="form-control" type="hidden" name="medicines_id[]" value="{{$medicine->id}}">
                        </td>
                        <td><input class="form-control" type="text" name="medicine_observations[]"></td>
                    </tr>
                @endforeach

                @foreach($supplies as $supply)
                    <tr>
                        <td>SUMINISTRO</td>
                        <td>{{$supply->name}}</td>
                        <td><input class="form-control" type="text" name="supplies_values[]">
                            <input class="form-control" type="hidden" name="supplies_id[]" value="{{$supply->id}}">
                        </td>
                        <td><input class="form-control" type="text" name="supplies_observations[]"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @canany(['SAMU administrador','SAMU creador inventarios ambulancia'])
        <div class="form-row">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i> Guardar
            </button>
        </div>
    @endcan

</form>

@endsection

@section('custom_js')

@endsection