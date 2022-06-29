<div>
    @if(!$selectedMis)
        <!-- Primera pantalla -->
        <h3 class="text-center mb-4">Seleccione el móvil</h3>
        <div class="row g-2">
            @foreach($openShift->mobilesInService as $mis)
            <div class="col-sm-6 d-grid gap-2">
                <button class="btn btn-lg btn-primary btn-block p-4"
                    wire:click="selectMis({{ $mis->id }})">
                    {{ $mis->mobile->code }} {{ $mis->mobile->name }}
                </button>
            </div>
            @endforeach
        </div>
    @else
        <!-- Segunda pantalla -->
        <h3 class="text-center mb-4">
            Móvil: {{ $selectedMis->mobile->code }}
            {{ $selectedMis->mobile->name }} -
            Seleccione el QTC
        </h3>
        <div class="row g-2 mb-4">
            @foreach($selectedMis->events->where('status',true) as $event)
            <div class="col-sm-6 d-grid gap-2">
                <a class="btn btn-lg btn-primary btn-block p-4"
                    href="{{ route('samu.mobiles.timestamps_locations',$event) }}">
                    QTC {{ $event->counter }}
                </a>
            </div>
            @endforeach
        </div>

        <div class="row g-2">
            <div class="col-12">
                <button class="btn btn-lg btn-outline-secondary btn-block p-4"
                    wire:click="cancel('selectedMis')">Volver</button>
            </div>
        </div>
    @endif
</div>
