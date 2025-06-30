<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th class="align-middle">Clasificación</th>
            <th class="align-middle">Total de Pacientes Únicos</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $classification => $count)
        <tr>
            <td class="text-center">{{ $classification }}</td>
            <td class="text-center">{{ $count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

