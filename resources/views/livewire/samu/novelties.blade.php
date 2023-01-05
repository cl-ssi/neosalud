<div>
    @include('samu.nav')

    <h4 class="mb-3 mt-3">Novedades</h4>
    
    <div class="row">
        <div class="col-9">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model.defer='search' placeholder="texto a buscar">
                <input type="date" class="form-control" wire:model.lazy='date'>
                <button class="btn btn-outline-secondary" wire:click='render' type="button">Buscar</button>
            </div>
        </div>
        @if($openShift)
        <div class="col-3 text-end">
            <a href="{{ route('samu.noveltie.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Crear Novedad
            </a>
        </div>
        @endif
    </div>

    @include('samu.noveltie.partials.list', ['novelties' => $novelties ])

    {{ $novelties->links() }}
</div>
