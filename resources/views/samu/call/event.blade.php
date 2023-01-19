
    <div class="row g-2 mb-3">
        <h4>
            <i class="fas fa-car-crash"></i> Cometidos asociados a la llamada
        </h4>
    </div>
    <div class="row g-2">
        <fieldset class="col-md-12 col-12">
            @foreach ($shift->events->reverse() as $key => $event)
            <div class="mb-3 form-check">
                <input
                    type="checkbox"
                    class="form-check-input"
                    name="events[]"
                    value="{{ $event->id }}"
                    @if(in_array($event->id, $call->events->pluck('id')->toArray())) checked @endif
                    disabled
                >
                <label class="form-check-label" for="for_events">
                    <b>Cometido:</b>
                    <a
                        class="btn btn-sm btn-outline-primary"
                        href="{{ route('samu.event.edit', $event) }}"
                    >
                        <i class="fas fa-edit"></i> {{ $event->id }}
                    </a>
                    - <b>Clave:</b> {{ $event->key->name }}
                    - <b>Móvil:</b> {{ optional($event->mobile)->code }} {{ optional($event->mobile)->name }}
                </label>
            </div>
            @endforeach
        </fieldset>

    </div>
