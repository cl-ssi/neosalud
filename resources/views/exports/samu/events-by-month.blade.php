<table>
    <thead>
        <tr>
            <th>Evento ID</th>
            <th>Hora de Llamado</th>
            <th>Hora de Despacho</th>
            <th>Hora de Arribo</th>
            <th>Hora de Regreso</th>
            <th>Centro Asistencial</th>
        </tr>
    </thead>
    <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->id }}</td>
                <td>{{ $event->call ? $event->call->created_at : 'No posee llamada' }}</td>
                <td>{{ $event->mobile_departure_at }}</td>
                <td>{{ $event->mobile_arrival_at }}</td>
                <td>{{ $event->return_base_at }}</td>
                <td>{{ $event->establishment->name ?? 'Desconocido' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
