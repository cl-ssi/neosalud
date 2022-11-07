<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Semana</th>
                    @foreach($mobilesType as $mobileType)
                        <th>Avg {{ $mobileType->short_name }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        <td class="text-left">
                            {{ $row['start'] }} AL {{ $row['end'] }}
                        </td>

                        @foreach($row['values'] as $value)
                            <td class="text-center">
                                <span
                                    data-toggle="tooltip"
                                    data-placement="bottom"
                                    title="{{ $value[0] . ' / ' . $value[1] }}"
                                >
                                    {{ $value[2] }}
                                </span>
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <caption>
                <small>
                    <span class="badge bg-danger">
                        Pendiente de validar el cálculo
                    </span>
                    Según los turnos de semana epidemiológica. Quedan excluidas las RU1 y RU2.
                </small>
            </caption>
        </table>

    </div>
</div>
