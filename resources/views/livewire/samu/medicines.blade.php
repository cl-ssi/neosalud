<div>
    @include('samu.nav')

    @switch($view)

        @case('index')
            <h3 class="mb-3">
                <i class="fas fa-syringe"></i> Listado de medicamentos 
                <button class="btn btn-success float-right" 
                    wire:click="create"><i class="fas fa-plus"></i> Crear nuevo</button>
            </h3>
            @include('samu.medicines.index')
            @break
        
        @case('create')
            <h3>Crear medicamento</h3>
            @include('samu.medicines.form')
            <button type="button" class="btn btn-primary" 
                wire:click="store">Crear</button>
            <button type="button" class="btn btn-outline-secondary" 
                wire:click="index">Cancelar</button>
            @break
        
        @case('edit')
            <h3>Editar medicamento</h3>
            @include('samu.medicines.form')
            <button type="button" class="btn btn-primary" 
                wire:click="update({{$medicine}})">Guardar</button>
            <button type="button" class="btn btn-outline-secondary" 
                wire:click="index">Cancelar</button>
            @break

    @endswitch
</div>
