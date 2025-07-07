<table class="table table-bordered table-striped align-middle">
    <thead class="table-dark text-center">
        <tr>
            <th rowspan="2" colspan="2" class="align-middle">Tipo de Accion</th>
            <th colspan="3" class="align-middle">N° de intervenciones</th>
            <th rowspan="2" class="align-middle">Beneficiarios</th>
            <th colspan="3" class="align-middle">Tiempo de llegada Intervenciones Criticas</th>
            <th colspan="3" class="align-middle">Tiempo de llegada Intervenciones No Criticas</th>
        </tr>
        <tr>
            <th class="align-middle">Total</th>
            <th class="align-middle">Criticas</th>
            <th class="align-middle">No Criticas</th>
            <th class="align-middle">0 - 20 min</th>
            <th class="align-middle">20 - 40 min</th>
            <th class="align-middle">Mas de 40 minutos</th>
            <th class="align-middle">0 - 20 min</th>
            <th class="align-middle">20 - 40 min</th>
            <th class="align-middle">Mas de 40 minutos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th rowspan="2">Intervenciones Clínicas Pre Hospitalarias</th>
            <th>Intervención de Móvil Básico</th>
            <td class="text-center">{{ $stats['BASIC']['COUNT']['TOTAL'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['COUNT']['CRITICAL'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['COUNT']['UNCRITICAL'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['RECIPIENTS'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['CRITICAL']['0 - 20 min'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['CRITICAL']['20 - 40 min'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['CRITICAL']['More than 40 min'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['UNCRITICAL']['0 - 20 min'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['UNCRITICAL']['20 - 40 min'] }}</td>
            <td class="text-center">{{ $stats['BASIC']['UNCRITICAL']['More than 40 min'] }}</td>
        </tr>
        <tr>
            <th>Intervención de Móvil Avanzado</th>
            <td class="text-center">{{ $stats['ADVANCED']['COUNT']['TOTAL'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['COUNT']['CRITICAL'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['COUNT']['UNCRITICAL'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['RECIPIENTS'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['CRITICAL']['0 - 20 min'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['CRITICAL']['20 - 40 min'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['CRITICAL']['More than 40 min'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['UNCRITICAL']['0 - 20 min'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['UNCRITICAL']['20 - 40 min'] }}</td>
            <td class="text-center">{{ $stats['ADVANCED']['UNCRITICAL']['More than 40 min'] }}</td>
        </tr>
    </tbody>
</table>