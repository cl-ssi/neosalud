@extends('layouts.app')
@section('content')
    @include('chagas.nav')
    <h4 class="mb-3">Listado de usuarios con permisos de Chagas</h4>

    <form action="{{ route('chagas.users.indexChagasUser') }}" method="GET">
        <div class="mb-3">
            <label for="search">Buscar por Nombre o Apellido:</label>
            <input type="text" name="search" id="search" class="form-control" value="{{ request('search') }}" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary mb-3">Buscar</button>
    </form>


    <div class="card mb-4">
        <div class="card-header">
            Organizaciones
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach ($organizations as $organization)
                    <li class="list-group-item">{{ $organization->alias }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('chagas.users.create') }}" class="btn btn-primary mb-3">Crear Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>Identificacion</th>
                <th>Nombre</th>
                <th>Organizaciones</th>
                <th>Permisos</th>
                <th scope="col">Selec.</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user ? $user->identifierRun->value . '-' . $user->identifierRun->dv : '' }}
                    </td>
                    <td>{{ $user->officialFullName ?? '' }}</td>
                    <td>
                        @if ($user->practitioners)
                            <ul>
                                @foreach ($user->practitioners as $practitioner)
                                    <li>{{ $practitioner->organization->alias ?? 'Organización no posee alias' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if ($user->permissions)
                            <ul>
                                @foreach ($user->permissions->sortBy('name') as $permission)
                                    <li>{{ $permission->name ?? '' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('chagas.users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>

                        @can('be god')
                            <a class="btn btn-warning btn-sm" title="Cambiar a usuario"
                                href="{{ route('user.switch', $user->id) }}"><span class="fas fa-redo"
                                    aria-hidden="true"></span></a>
                        @endcan
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
