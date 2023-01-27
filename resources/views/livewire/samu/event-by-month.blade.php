<div>
    @include('samu.nav')

    <div class="row mb-2">
        <div class="col-sm-6">
            <h3>
                <i class="fas fa-clipboard-list"></i> Eventos por mes
            </h3>
        </div>
        <div class="col-sm-6 text-right">
            <fieldset class="form-group">
                <div class="input-group">
                    <span class="input-group-text" id="for-month">Mes y Año</span>
                    <input
                        type="month"
                        id="for-month"
                        class="form-control form-control-sm"
                        wire:model.debounce.1000ms="year_month"
                    >
                </div>
            </fieldset>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-small">
            <thead>
                <tr>
                    <th class="text-center">
                        Evento ID
                    </th>
                    <th>
                        Hora de Llamado
                    </th>
                    <th>
                        Hora de Despacho
                    </th>
                    <th>
                        Hora de Arribo
                    </th>
                    <th>
                        Hora de Regreso
                    </th>
                    <th>
                        Centro Asistencial
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('samu.event.edit', $event) }}" target="_blank">
                            {{ $event->id }}
                        </a>
                    </td>
                    <td>{{ $event->call ? $event->call->created_at : 'No posee llamada' }}</td>
                    <td>{{ $event->mobile_departure_at }}</td>
                    <td>{{ $event->mobile_arrival_at }}</td>
                    <td>{{ $event->return_base_at }}</td>
                    <td>{{ $event->establishment->name ?? 'Desconocido' }}</td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="6">
                        <em>
                            No hay eventos para el mes seleccionado
                        </em>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            {{ $events->links() }}
        </div>
        <div class="col">
            <button
                class="btn btn-md btn-success float-end"
                wire:click="download"
                wire:loading.attr="disabled"
            >
                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                    wire:loading
                    wire:target="download"
                >
                </span>
                <span
                    wire:loading.remove
                    wire:target="download"
                >
                    <i class="fas fa-download"></i>
                </span>

                Descargar
            </button>
        </div>
    </div>
</div>
