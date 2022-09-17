@extends('layouts.app')

@section('title', 'Organizaciones')

@section('content')

@canany(['Mp: user'])
    @include('medical_programmer.nav')
@endcanany

<h2 class="mb-3">{{$type}}</h2>
<a class="btn btn-primary btn-sm mb-1" href="#">Crear</a>

<table class="table table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($organizations as $organization)
        <tr>
            <td>{{ $organization->id ?? '' }}</td>
            <td>{{ $organization->name ?? '' }}</td>
            <td>{{ $organization->alias ?? '' }}</td>
            <td>
                <a href="{{ route('parameter.organization.edit', $organization )}}"><span data-feather="edit"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('custom_js')

@endsection