@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col-sm">
        <h3 class="mb-3"><i class="fas fa-user-injured"></i> Lista de Codificacion de Claves</h3>
    </div>
    <div class="col-sm">
        <a class="btn btn-success float-end" href="{{ route('samu.key.create') }}">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
</div>


<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="{{ route('samu.key.index') }}">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search_key" autocomplete="off" id="for_search"
                style="text-transform: uppercase;" placeholder="Codigo" value="{{ $search_key }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-sm table-striped">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody >
            @foreach($keys as $key)
            <tr>
                <td>
                    <a href="{{ route('samu.key.edit', $key) }}">
                        <button type="button" class="btn btn-sm btn-outline-primary mx-1">
                            <i class="fas fa-edit"></i>
                        </button>
                    </a>
                </td>
                <td>{{ $key->key }}</td>
                <td>{{ $key->name }}</td>
                <td>
                    <form method="POST" action="{{ route('samu.key.destroy' , $key) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger mx-1">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{ $keys->links() }}

@endsection


@section('custom_js')
<script>

$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
@endsection
