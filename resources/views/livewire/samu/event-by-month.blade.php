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
                        wire:model="year_month"
                    >
                </div>
            </fieldset>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th class="text-center">Evento ID</th>
                    <th>Fecha</th>
                    <th>Móvil / Inst.</th>
                    <th>Comuna Origen</th>
                    <th>Hora Llamado</th>
                    <th>Hora Despacho</th>
                    <th>Hora Arribo</th>
                    <th>Centro Asistencial (Destino)</th>
                    <th>Llegada C.A.</th>
                    <th>Recep. Pcte</th>
                    <th>Retorno Base</th>
                    <th>En Base</th>
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
                    <td>{{ optional($event->date)->format('Y-m-d') }}</td>
                    <td>
                        {{ $event->mobile_in_letters }}
                        @if($event->mobile_institution)
                            <span class="badge {{ $event->mobile_institution == 'SAMU' ? 'bg-primary' : 'bg-secondary' }}">
                                {{ $event->mobile_institution }}
                            </span>
                        @endif
                    </td>
                    <td>{{ optional($event->commune)->name ?? optional(optional($event->call)->commune)->name }}</td>
                    <td>{{ $event->call ? optional($event->call->created_at)->format('H:i') : 'No posee' }}</td>
                    <td>{{ optional($event->mobile_departure_at)->format('H:i') }}</td>
                    <td>{{ optional($event->mobile_arrival_at)->format('H:i') }}</td>
                    <td>{{ optional($event->establishment)->name ?? optional($event->receptionPlace)->name ?? 'Desconocido' }}</td>
                    <td>{{ optional($event->healthcenter_at)->format('H:i') }}</td>
                    <td>{{ optional($event->patient_reception_at)->format('H:i') }}</td>
                    <td>{{ optional($event->return_base_at)->format('H:i') }}</td>
                    <td>{{ optional($event->on_base_at)->format('H:i') }}</td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="12">
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

                Descargar Excel
            </button>
        </div>
    </div>
</div>
