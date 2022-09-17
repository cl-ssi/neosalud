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
                        <td class="text-center">{{ $row['avg_M1'] }}</td>
                        <td class="text-center">{{ $row['avg_M2'] }}</td>
                        <td class="text-center">{{ $row['avg_M3'] }}</td>
                        <td class="text-center">{{ $row['avg_Hibrido'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <caption>
                Según los turnos de semana epidemiológica. Quedan excluidas las RU1 y RU2.
            </caption>
        </table>

    </div>
</div>
