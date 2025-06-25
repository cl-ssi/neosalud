<div>    
    <h1 class="text-center mb-4">Estadísticas de Eventos SAMU</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <p class="text-center">A continuación se presentan las estadísticas de eventos SAMU por rango etario y sexo,
                    incluyendo Síndrome Coronario Agudo, Paro Cardiaco Respiratorio y Politraumatismo.</p>
                </div>
                <div class="col-2">
                    <button wire:click="exportExcel" class="btn btn-primary">Exportar a Excel</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                <tr>
                    <th rowspan="3" colspan="1" class="align-middle">Causas de la Intervencion</th>
                    <th rowspan="2" colspan="3" class="align-middle">Totales</th>
                    <th rowspan="1" colspan="34" class="align-middle">Rango Etario (En Años)</th>
                </tr>
                <tr>
                    @foreach ($this->ages as $age)
                        <th colspan="2" class="align-middle">{{ $age[0] }} - {{ $age[1] }} años</th>
                    @endforeach
                </tr>
                <tr>
                    <th class="align-middle">Ambos Sexos</th>
                    <th class="align-middle">Hombres</th>
                    <th class="align-middle">Mujeres</th>
                    @foreach ($this->ages as $age)
                        <th class="align-middle">Hombres</th>
                        <th class="align-middle">Mujeres</th>                        
                    @endforeach
                </thead>
                <tbody>
                @foreach (SELF::LABELS as $key => $label)
                    <tr>                        
                        <td class="text-center">{{ $label }}</td>
                        <td class="text-center">{{ $stats[$key]['total']['both'] }}</td>
                        <td class="text-center">{{ $stats[$key]['total']['male'] }}</td>
                        <td class="text-center">{{ $stats[$key]['total']['female'] }}</td>
                        @foreach ($this->ages as $age)
                            <td class="text-center">{{ $stats[$key][$age[0] . '-' . $age[1]]['male'] }}</td>
                            <td class="text-center">{{ $stats[$key][$age[0] . '-' . $age[1]]['female'] }}</td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
