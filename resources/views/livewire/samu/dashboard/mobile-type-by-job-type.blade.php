<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Tipo Funcionario</th>
                    <th class="text-center">M1</th>
                    <th class="text-center">M2</th>
                    <th class="text-center">M2</th>
                    <th class="text-center">Híbrido</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $result)
                <tr>
                    <td>
                        {{ $result['job_type_name'] }}
                    </td>
                    <td class="text-center">
                        {{ $result['total_' . $result['job_type_name'] . '_M1'] }}"
                    </td>
                    <td class="text-center">
                        {{ $result['total_' . $result['job_type_name'] . '_M2'] }}"
                    </td>
                    <td class="text-center">
                        {{ $result['total_' . $result['job_type_name'] . '_M3'] }}"
                    </td>
                    <td class="text-center">
                        {{ $result['total_' . $result['job_type_name'] . '_Hibrido'] }}"
                    </td>
                    <td class="text-center">
                        {{ $result['total_' . $result['job_type_name'] ] }}"
                    </td>
                </tr>
                @endforeach
            </tbody>
            <caption>
                Según turnos de semana epidemiológica: {{ $week['start']->format('d/m') }} al
                {{ $week['end']->format('d/m') }}. Excluidas las RU1 y RU2.
            </caption>
        </table>
    </div>
</div>
