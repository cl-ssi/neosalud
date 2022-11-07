@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col">
        <h3 class="mb-3"><i class="fas fa-ambulance"></i> Plantillas de inventario</h3>
    </div>
</div>

<br>

<div class="table-responsive">
    <table class="table table-sm table-bordered">
        <tbody>
            <tr class="table-secondary">
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th></th>
            </tr>
            @foreach($mobileTypes as $mobileType)
                <tr>
                    <td>{{ $mobileType->id }}</td>
                    <td>{{ $mobileType->name }}</td>
                    <td>{{ $mobileType->description }}</td>
                    <td>
                        @if($mobileType->serviceInventoryTemplates->count()>0)
                            <form method="GET" action="{{ route('samu.mobileinserviceinventory.templates.edit' , $mobileType) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm"><span class="fas fa-edit" aria-hidden="true"></span></button>
                            </form>
                        @else
                        <form method="GET" action="{{ route('samu.mobileinserviceinventory.templates.create' , $mobileType) }}">
                                @csrf
                                <button type="submit" class="btn btn-sm"><span class="fas fa-edit" aria-hidden="true"></span></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('custom_js')

@endsection
