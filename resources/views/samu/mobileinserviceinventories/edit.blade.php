@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar un inventario</h3>

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

<h4>Medicinas e Insumos</h4>

<form method="POST" action="{{ route('samu.mobileinserviceinventory.details.update' , $mis) }}">
    <!-- @csrf -->
    @method('PUT')

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th>Tipo</th>
                    <th>Nombre</th>
                    <th >Cantidad</th>
                    <th width="10%">Existencia</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="mobile_in_service_id" value="{{$mis->id}}">
                @foreach($medicines as $key1 => $medicine)
                    <tr>
                        <td>MEDICINA</td>
                        <td>{{$medicine->name}}</td>
                        <td>{{$mis->type->serviceInventoryTemplates->where('medicine_id',$medicine->id)->first()->value}}</td>
                        <td>
                            <!-- <input class="form-control" type="text" name="medicines_values[]" @if($mis->inventory->details->where('medicine_id',$medicine->id)->first()) value="{{$mis->inventory->details->where('medicine_id',$medicine->id)->first()->status}} @endif">
                            <input class="form-control" type="hidden" name="medicines_id[]" value="{{$medicine->id}}"> -->
                            <input type='hidden' value='0' name='medicines_values[{{$key1}}]'>
                            @if($mis->type->serviceInventoryTemplates->where('medicine_id',$medicine->id)->first()->value > 0)
                                <input class="form-check-input" type="checkbox" value="1" name="medicines_values[{{$key1}}]" @if($mis->inventory->details->where('medicine_id',$medicine->id)->first()->status) checked @endif>
                            @else
                                <input class="form-check-input" type="checkbox" disabled>
                            @endif
                            <input class="form-control" type="hidden" name="medicines_id[{{$key1}}]" value="{{$medicine->id}}">
                        </td>
                        <td><input class="form-control" type="text" name="medicine_observations[]" @if($mis->inventory->details->where('medicine_id',$medicine->id)->first()) value="{{$mis->inventory->details->where('medicine_id',$medicine->id)->first()->observation}} @endif"></td>
                    </tr>
                @endforeach

                @foreach($supplies as $key2 => $supply)
                    <tr>
                        <td>SUMINISTRO</td>
                        <td>{{$supply->name}}</td>
                        <td>{{$mis->type->serviceInventoryTemplates->where('supply_id',$supply->id)->first()->value}}</td>
                        <td>
                            <!-- <input class="form-control" type="text" name="supplies_values[]" @if($mis->inventory->details->where('supply_id',$supply->id)->first()) value="{{$mis->inventory->details->where('supply_id',$supply->id)->first()->status}}" @endif>
                            <input class="form-control" type="hidden" name="supplies_id[]" value="{{$supply->id}}"> -->
                            <input type='hidden' value='0' name='supplies_values[{{$key2}}]'>
                            @if($mis->type->serviceInventoryTemplates->where('supply_id',$supply->id)->first()->value > 0)
                            <input class="form-check-input" type="checkbox" value="1" name="supplies_values[{{$key2}}]" @if($mis->inventory->details->where('supply_id',$supply->id)->first()->status) checked @endif>
                            @else
                                <input class="form-check-input" type="checkbox" disabled>
                            @endif
                            <input class="form-control" type="hidden" name="supplies_id[{{$key2}}]" value="{{$supply->id}}">
                        </td>
                        <td><input class="form-control" type="text" name="supplies_observations[]" @if($mis->inventory->details->where('supply_id',$supply->id)->first()) value="{{$mis->inventory->details->where('supply_id',$supply->id)->first()->observation}}" @endif></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @canany(['SAMU administrador','SAMU aprobador inventarios ambulancia'])
        <button type="button" class="btn btn-warning" onclick="confirm_inventory()" @if($mis->inventory->approbation_date) disabled @endif>
            <i class="fas fa-plus"></i> Confirmar
        </button>
    @endcan
    @canany(['SAMU administrador','SAMU creador inventarios ambulancia'])
        <button type="submit" class="btn btn-primary" @if($mis->inventory->approbation_date) disabled @endif>
            <i class="fas fa-plus"></i> Guardar
        </button>
    @endcan

</form>

<br>

@if($mis->inventory->creation_date)
    <div class="alert alert-success" role="alert">
    El inventario fue <b>creado</b> el {{$mis->inventory->creation_date->format('d-m-Y')}} por {{$mis->inventory->creator->getOfficialFullNameAttribute()}}
    </div>
@endif

@if($mis->inventory->approbation_date)
    <div class="alert alert-warning" role="alert">
    El inventario fue <b>aprobado</b> el {{$mis->inventory->approbation_date->format('d-m-Y')}} por {{$mis->inventory->approbator->getOfficialFullNameAttribute()}}
    </div>
@endif

<form method="POST" name="confirm_form" action="{{ route('samu.mobileinserviceinventory.details.confirm_inventory' , $mis) }}">
    @csrf
    @method('GET')
    <input type="hidden" name="mobile_in_service_id" value="{{$mis->id}}">
</form>

@endsection

@section('custom_js')
<script>
    function confirm_inventory() {
        document.confirm_form.submit();
    }
</script>
@endsection