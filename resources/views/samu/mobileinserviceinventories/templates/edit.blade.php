@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar una plantilla</h3>

<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
            <tr>
                <td>{{ $mobileType->id }}</td>
                <td>{{ $mobileType->name }}</td>
                <td>{{ $mobileType->description }}</td>
            </tr>
        </tbody>
    </table>
</div>

<h4>Medicinas e Insumos</h4>

<form method="POST" action="{{ route('samu.mobileinserviceinventory.templates.update' , $mobileType) }}">
    @csrf
    @method('PUT')

    <div class="table-responsive">
        <table class="table table-sm table-bordered">
            <thead>
                <tr class="table-secondary">
                    <th width="20%">Tipo</th>
                    <th width="20%">Nombre</th>
                    <th width="20%">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="type_id" value="{{$mobileType->id}}">
                @foreach($medicines as $medicine)
                    <tr>
                        <td>MEDICINA</td>
                        <td>{{$medicine->name}}</td>
                        <td><input class="form-control" type="text" name="medicines_values[]" @if($mobileType->serviceInventoryTemplates->where('medicine_id',$medicine->id)->first()) value="{{$mobileType->serviceInventoryTemplates->where('medicine_id',$medicine->id)->first()->value}} @endif">
                            <input class="form-control" type="hidden" name="medicines_id[]" value="{{$medicine->id}}">
                        </td>
                    </tr>
                @endforeach

                @foreach($supplies as $supply)
                    <tr>
                        <td>SUMINISTRO</td>
                        <td>{{$supply->name}}</td>
                        <td><input class="form-control" type="text" name="supplies_values[]" @if($mobileType->serviceInventoryTemplates->where('supply_id',$supply->id)->first()) value="{{$mobileType->serviceInventoryTemplates->where('supply_id',$supply->id)->first()->value}}" @endif>
                            <input class="form-control" type="hidden" name="supplies_id[]" value="{{$supply->id}}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-plus"></i> Guardar
        </button>
    </div>
</form>


@endsection

@section('custom_js')

@endsection