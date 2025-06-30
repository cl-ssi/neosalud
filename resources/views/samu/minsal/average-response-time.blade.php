<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th class="align-middle">Tipo de Emergencia</th>
            <th class="align-middle">Mes</th>
            <th class="align-middle">Número de Mes</th>
            <th class="align-middle">Tiempo Promedio de Respuesta (minutos)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $emergencyType => $monthlyData)
            @foreach ($monthlyData as $item)
            <tr>
                <td class="text-center">{{ $emergencyType }}</td>
                <td class="text-center">{{ $item->month_name }}</td>
                <td class="text-center">{{ $item->month }}</td>
                <td class="text-center">{{ $item->avg_response_time }}</td>
            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

