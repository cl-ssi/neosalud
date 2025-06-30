<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th class="align-middle">Mes</th>
            <th class="align-middle">Número de Mes</th>
            <th class="align-middle">Total de Llamadas Despachadas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td class="text-center">{{ $item->month_name }}</td>
            <td class="text-center">{{ $item->month }}</td>
            <td class="text-center">{{ $item->total }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

