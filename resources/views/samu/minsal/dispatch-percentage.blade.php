<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th class="align-middle">Mes</th>
            <th class="align-middle">Número de Mes</th>
            <th class="align-middle">Llamadas Gestionadas</th>
            <th class="align-middle">Llamadas Despachadas</th>
            <th class="align-middle">Porcentaje de Despacho (%)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">{{ $item->month_name }}</td>
            <td class="text-center">{{ $item->month }}</td>
            <td class="text-center">{{ $item->managed }}</td>
            <td class="text-center">{{ $item->dispatched }}</td>
            <td class="text-center">{{ $item->percentage }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

