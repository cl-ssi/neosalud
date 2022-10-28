<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th>Editar</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Válido desde</th>
            <th>Válido hasta</th>
            <th>Valor</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($medicines as $medicine)
        <tr>
            <td>
                <button type="button" class="btn btn-sm btn-primary" 
                    wire:click="edit({{$medicine}})"><i class="fas fa-edit"></i></button>
            </td>
            <td>{{ $medicine->code }}</td>
            <td>{{ $medicine->name }}</td>
            <td>{{ $medicine->valid_from->format('Y-m-d') }}</td>
            <td>{{ optional($medicine->valid_to)->format('Y-m-d') }}</td>
            <td>{{ $medicine->value }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" 
                    wire:click="delete({{$medicine}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>