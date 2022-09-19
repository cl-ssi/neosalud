<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Semana</th>
                    <th>Avg M1</th>
                    <th>Avg M2</th>
                    <th>Avg M3</th>
                    <th>Avg Hib.</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td class="text-left">
                            {{ $row['start'] }} AL {{ $row['end'] }}
                        </td>
                        <td class="text-center">
                            <span data-toggle="tooltip" data-placement="bottom" title="{{ $row['sum_M1'] . ' / ' . $row['quantity_M1'] }}">
                                {{ $row['avg_M1'] }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span data-toggle="tooltip" data-placement="bottom" title="{{ $row['sum_M2'] . ' / ' . $row['quantity_M2'] }}">
                                {{ $row['avg_M2'] }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span data-toggle="tooltip" data-placement="bottom" title="{{ $row['sum_M3'] . ' / ' . $row['quantity_M3'] }}">
                                {{ $row['avg_M3'] }}
                            </span>
                        </td>
                        <td class="text-center">
                            <span data-toggle="tooltip" data-placement="bottom" title="{{ $row['sum_Hibrido'] . ' / ' . $row['quantity_Hibrido'] }}">
                                {{ $row['avg_Hibrido'] }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <caption>
                Según los turnos de semana epidemiológica. Quedan excluidas las RU1 y RU2.
            </caption>
        </table>

    </div>
</div>
