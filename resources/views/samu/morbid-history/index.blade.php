<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th style="width: 10%">Editar</th>
            <th>Nombre</th>
            <th style="width: 10%">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($morbidHistories as $morbidHistory)
        <tr>
            <td>
                <button type="button" class="btn btn-sm btn-primary" 
                    wire:click="edit({{$morbidHistory}})"><i class="fas fa-edit"></i></button>
            </td>
            <td>{{ $morbidHistory->name }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" 
                    wire:click="delete({{$morbidHistory}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>