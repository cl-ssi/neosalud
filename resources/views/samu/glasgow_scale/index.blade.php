<table class="table table-sm table-bordered">
    <thead>
        <tr>
            <th style="width: 10%">Editar</th>
            <th>Rango etario</th>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Valor</th>
            <th style="width: 10%">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($glasgowScales as $glasgowScale)
        <tr>
            <td>
                <button type="button" class="btn btn-sm btn-primary" 
                    wire:click="edit({{$glasgowScale}})"><i class="fas fa-edit"></i></button>
            </td>
            <td>{{ $glasgowScale->age_range }}</td>
            <td>{{ $glasgowScale->type }}</td>
            <td>{{ $glasgowScale->name }}</td>
            <td>{{ $glasgowScale->value }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-danger" 
                    wire:click="delete({{$glasgowScale}})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>