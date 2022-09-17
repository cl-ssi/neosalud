<div>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Semana</th>
                    <th class="text-center">Promedio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($weeks as $week)
                    <tr>
                        <td>
                            {{ $week['start'] }} AL {{ $week['end'] }}
                        </td>
                        <td class="text-center">
                            {{ $week['avg'] }}'
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <caption>
                <small>
                    Basados en los eventos con marcas de tiempo AP y Retorno a Base.
                </small>
            </caption>
        </table>
    </div>
</div>
