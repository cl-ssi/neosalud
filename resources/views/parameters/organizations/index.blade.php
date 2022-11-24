@extends('layouts.app')

@section('title', 'Organizaciones')

@section('content')

@canany(['Mp: user'])
    @include('medical_programmer.nav')
@endcanany

<h2 class="mb-3">{{$type}}</h2>
<a class="btn btn-primary mb-2" href="{{ route('parameter.organization.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<table class="table table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Código DEIS</th>
            <th>Código SIRH</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($organizations as $organization)
        <tr>
            <td>{{ $organization->id ?? '' }}</td>
            <td>{{ $organization->name ?? '' }}</td>
            <td>{{ $organization->alias ?? '' }}</td>
            <td>{{ $organization->code_deis ?? '' }}</td>
            <td>{{ $organization->sirh_code ?? '' }}</td>
            <td>
                <a href="{{ route('parameter.organization.edit', $organization )}}"><span data-feather="edit"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $organizations->links('pagination::bootstrap-4') }}

@endsection

@section('custom_js')

@endsection