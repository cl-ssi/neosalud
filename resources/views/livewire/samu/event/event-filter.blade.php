<div>
    @include('samu.nav')

    <h3 class="mb-3"><i class="fas fa-car-crash"></i> Buscar eventos</h3>

    <div class="row g-2">
        <fieldset class="form-group col-sm-2">
            <label for="for_date">Fecha {{ $date }}</label>
            <input
                type="date"
                class="form-control"
                wire:model.defer="date"
                id="date"
                value="{{ old('date') }}"
            >
        </fieldset>

        <fieldset class="form-group col-sm-2">
            <label for="for_key">Clave</label>
            <select class="form-select" wire:model.defer="key_id">
                <option value=""></option>
                @foreach($keys as $key)
                    <option value="{{ $key->id }}"">
                        {{ $key->key }}  - {{ $key->name }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-3">
            <label for="for_address">Dirección</label>
            <input
                type="text"
                class="form-control"
                wire:model.defer="address"
                value="{{ old('address') }}"
            >
        </fieldset>

        <fieldset class="form-group col-sm-2">
            <label for="for_commune">Comuna</label>
            <select class="form-select" wire:model.defer="commune_id">
                <option value=""></option>
                @foreach($communes as $name => $id)
                    <option value="{{ $id }}" >
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-sm-2">
            <label for="filter_by">Filtrar por</label>
            <select class="form-select" id="filter_by" wire:model.defer="filter_by">
                <option value="all">Todos los eventos</option>
                <option value="valid">Eventos válidos</option>
            </select>
        </fieldset>

        <div class="form-group col-md-1">
            <label>&nbsp;</label>
            <button
                class="btn btn-primary"
                wire:click="getEvents"
                wire:loading.attr="disabled"
                wire:target="getEvents"
            >
                <span wire:loading.remove wire:target="getEvents">
                    <i class="fas fa-search"></i>
                </span>

                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                    wire:loading
                    wire:target="getEvents">
                </span>

                Buscar
            </button>
        </div>
    </div>

    @if($events->isNotEmpty())
        <hr>
        <h4>Total de registros: {{ $events->total() }}</h4>

        @include('samu.event.partials.index', ['events' => $events, 'btnDuplicate' => false])

        {{ $events->links() }}
    @else
        <br>
        <div class="alert alert-warning">
            No hay eventos con esos parámetros
        </div>
    @endif

</div>
