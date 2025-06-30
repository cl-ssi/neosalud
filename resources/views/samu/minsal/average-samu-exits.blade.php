<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th class="align-middle">Mes</th>
            <th class="align-middle">Número de Mes</th>
            <th class="align-middle">Total de Salidas</th>
            <th class="align-middle">Días en el Mes</th>
            <th class="align-middle">Promedio Diario</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">{{ $item->month_name }}</td>
            <td class="text-center">{{ $item->month }}</td>
            <td class="text-center">{{ $item->total }}</td>
            <td class="text-center">{{ $item->days_in_month }}</td>
            <td class="text-center">{{ $item->average_daily }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

