<table>
    <thead>
        <tr>
            <th>ID Cometido</th>
            <th>Fecha Cometido</th>
            <th>Móvil</th>
            <th>Institución Móvil</th>
            <th>Comuna Origen</th>
            <th>Establecimiento de Origen</th>
            <th>Establecimiento de Destino</th>
            <th>Ubicación en Destino</th>
            <th>Hora de Llamado</th>
            <th>Hora de Despacho</th>
            <th>Hora de Arribo al Lugar</th>
            <th>Llegada Centro Asistencial (healthcenter_at)</th>
            <th>Recepción Paciente (patient_reception_at)</th>
            <th>Retorno a Base (return_base_at)</th>
            <th>Móvil en Base (on_base_at)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ optional($event->date)->format('Y-m-d') }}</td>
                <td>{{ $event->mobile_in_letters }}</td>
                <td>{{ $event->mobile_institution }}</td>
                <td>{{ optional($event->commune)->name ?? optional(optional($event->call)->commune)->name }}</td>
                <td>{{ $event->origin_establishment }}</td>
                <td>{{ optional($event->establishment)->name ?? optional($event->receptionPlace)->name }}</td>
                <td>{{ $event->establishment_details }}</td>
                <td>{{ $event->call ? optional($event->call->created_at)->format('Y-m-d H:i') : 'No posee llamada' }}</td>
                <td>{{ optional($event->mobile_departure_at)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($event->mobile_arrival_at)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($event->healthcenter_at)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($event->patient_reception_at)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($event->return_base_at)->format('Y-m-d H:i') }}</td>
                <td>{{ optional($event->on_base_at)->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
