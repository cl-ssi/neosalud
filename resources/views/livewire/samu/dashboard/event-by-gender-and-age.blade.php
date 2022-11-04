<div>
    <div class="row g-2 my-1">
        <fieldset class="form-group col-md-3">
            <label for="for-month">Mes</label>
            <select
                name="type"
                id="for-month"
                class="form-select"
                wire:model="month"
            >
                <option value="01">Enero</option>
                <option value="02">Febrero</option>
                <option value="03">Marzo</option>
                <option value="04">Abril</option>
                <option value="05">Mayo</option>
                <option value="06">Junio</option>
                <option value="07">Julio</option>
                <option value="08">Agosto</option>
                <option value="09">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </fieldset>
        <fieldset class="form-group col-md-3">
            <label for="for-year">Año</label>
            <select
                name="type"
                id="for-year"
                class="form-select"
                wire:model="year"
            >
                @foreach($years as $itemYear)
                    <option value="{{ $itemYear }}">
                        {{ $itemYear }}
                    </option>
                @endforeach
            </select>
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
