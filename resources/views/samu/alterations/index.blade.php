<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th style="width: 10%">Editar</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th style="width: 10%">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alterations as $alteration)
        <tr>
            <td>
                <button type="button" class="btn btn-sm btn-primary" 
                    wire:click="edit({{$alteration}})"><i class="fas fa-edit"></i></button>
            </td>
            <td>{{ $alteration->type }}</td>
            <td>{{ $alteration->name }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" 
                    wire:click="delete({{$alteration}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>