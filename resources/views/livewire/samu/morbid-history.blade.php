<div>
    @include('samu.nav')

    @switch($view)
    
        @case('index')
            <h3 class="mb-3">
                <i class="fas fa-syringe"></i> Listado de antecedentes mórbidos 
                <button class="btn btn-success float-right" 
                    wire:click="create"><i class="fas fa-plus"></i> Crear nuevo</button>
            </h3>
            @include('samu.morbid-history.index')
            @break
        
        @case('create')
            <h3>Crear antecedentes mórbido</h3>
            @include('samu.morbid-history.form')
            <button type="button" class="btn btn-primary" 
                wire:click="store">Crear</button>
            <button type="button" class="btn btn-outline-secondary" 
                wire:click="index">Cancelar</button>
            @break
        
        @case('edit')
            <h3>Editar antecedente mórbido</h3>
            @include('samu.morbid-history.form')
            <button type="button" class="btn btn-primary" 
                wire:click="update({{$morbidHistory}})">Guardar</button>
            <button type="button" class="btn btn-outline-secondary" 
                wire:click="index">Cancelar</button>
            @break
    
    @endswitch
</div>
