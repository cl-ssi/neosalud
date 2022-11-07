<div>
    <div class="row g-2 my-1">
        <fieldset class="form-group col-md-3">
            <div class="input-group">
                <span class="input-group-text" id="for-month">Mes y Año</span>
                <input
                    type="month"
                    id="for-month"
                    class="form-control form-control-sm"
                    wire:model.debounce.1000ms="year_month"
                >
            </div>
        </fieldset>
    </div>

    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Género-Grupo Etario</th>
                    @foreach($genders as $gender)
                        <th>
                            {{ $gender['text'] }}
                        </th>
                    @endforeach
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $index => $row)
                <tr>
                    <td>
                        @if($index <= count($ages) - 1)
                            @if($ages[$index]['start'] === null && $ages[$index]['end'] === null)
                                NO INFORMADO
                            @else
                                {{ $ages[$index]['start'] }}

                                @if($ages[$index]['end'] < 150)
                                    a {{ $ages[$index]['end'] }} años
                                @else
                                    años o más
                                @endif
                            @endif
                        @else
                            <b>Total</b>
                        @endif
                    </td>
                    @foreach($row as $total)
                    <td>
                        {{ $total }}
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
