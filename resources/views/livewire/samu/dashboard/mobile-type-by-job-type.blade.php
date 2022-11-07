<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Tipo Funcionario</th>
                    @foreach($mobilesType as $mobileType)
                        <th class="text-center">
                            {{ $mobileType->name }}
                        </th>
                    @endforeach
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td>
                            {{ $row['job_type_name'] }}
                        </td>
                        @foreach($row['values'] as $value)
                            <td>
                                {{ $value }}"
                            </td>
                        @endforeach
                        <td class="text-center">
                            {{ $row['total'] }}"
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <caption>
                <span class="badge bg-danger">
                    Pendiente de validar el cálculo
                </span>
                <small>
                    Según turnos de semana epidemiológica: aca {{ $week['start']->format('d/m') }} al
                    {{ $week['end']->format('d/m') }}. Excluidas las RU1 y RU2.
                </small>
            </caption>
        </table>
    </div>
</div>
