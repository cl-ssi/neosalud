<div>
    @canany(['Developer', 'Administrator', 'SAMU'])
    @include('samu.nav')
    @endcan

    @if($showExportModal)
    <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,0.5);">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Qué sección desea exportar?</h5>
                    <button type="button" class="btn-close" wire:click="showExportOptions(false)"></button>
                </div>
                <div class="modal-body text-center">
                    <button class="btn btn-outline-primary m-2" wire:click="setExportSection('N')">Sección N</button>
                    <button class="btn btn-outline-success m-2" wire:click="setExportSection('K')">Sección K</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-3 justify-content-end align-self-end">
            <h5 wire:loading>
                Cargando Datos...
                <div class="spinner-border spinner-border-sm" role="status">
                </div>
            </h5>
        </div>
        <div class="col-6">
            @livewire('samu.month-year-selector', ['month' => $month, 'year' => $year])
        </div>
        <div class="offset-1 col-2 align-self-end">
            <!-- <button class="btn btn-primary" wire:click="showExportOptions(true)">Exportar a Excel</button> -->
        </div>
    </div>
    <br></br>
    <h1 class="text-center mb-4">Estadísticas de Eventos SAMU</h1>
    <br></br>
    <div class="container">
        <!-- Sección N: Estadísticas de eventos SAMU -->
        <div class="row justify-content-center">
            <div class="col-2">
                <h2>Seccion N:</h2>
            </div>
            <div class="col-10">
                <h4>Estadísticas de eventos SAMU por rango etario y sexo, incluyendo Síndrome Coronario Agudo, Paro Cardiaco Respiratorio y Politraumatismo.</h4>
            </div>
        </div>
        <div class="row overflow-auto">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle mb-0">
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
                            <td class="text-center">{{ $N[$key]['total']['both'] }}</td>
                            <td class="text-center">{{ $N[$key]['total']['male'] }}</td>
                            <td class="text-center">{{ $N[$key]['total']['female'] }}</td>
                            @foreach ($this->ages as $age)
                            <td class="text-center">{{ $N[$key][$age[0] . '-' . $age[1]]['male'] }}</td>
                            <td class="text-center">{{ $N[$key][$age[0] . '-' . $age[1]]['female'] }}</td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <br></br>

        <!-- Sección K: Intervenciones Pre-Hospitalarias SAMU -->
        <div class="row justify-content-center">
            <div class="col-2">
                <h3>Seccion K:</h3>
            </div>
            <div class="col-10">
                <h4 class="text-center">Estadísticas de intervenciones clínicas prehospitalarias SAMU, detalladas por tipo de móvil, criticidad, beneficiarios y tiempos de llegada.</h4>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
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
                            <td class="text-center">{{ $K['BASIC']['COUNT']['TOTAL'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['COUNT']['CRITICAL'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['COUNT']['UNCRITICAL'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['RECIPIENTS'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['CRITICAL']['0 - 20 min'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['CRITICAL']['20 - 40 min'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['CRITICAL']['More than 40 min'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['UNCRITICAL']['0 - 20 min'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['UNCRITICAL']['20 - 40 min'] }}</td>
                            <td class="text-center">{{ $K['BASIC']['UNCRITICAL']['More than 40 min'] }}</td>
                        </tr>
                        <tr>
                            <th>Intervención de Móvil Avanzado</th>
                            <td class="text-center">{{ $K['ADVANCED']['COUNT']['TOTAL'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['COUNT']['CRITICAL'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['COUNT']['UNCRITICAL'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['RECIPIENTS'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['CRITICAL']['0 - 20 min'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['CRITICAL']['20 - 40 min'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['CRITICAL']['More than 40 min'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['UNCRITICAL']['0 - 20 min'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['UNCRITICAL']['20 - 40 min'] }}</td>
                            <td class="text-center">{{ $K['ADVANCED']['UNCRITICAL']['More than 40 min'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br><br>

        <!-- Sección L: Estadísticas de SAMU -->
        <div class="row justify-content-center">
            <div class="col-2">
                <h3>Seccion L:</h3>
            </div>
            <div class="col-10">
                <h4 class="text-center">Estadísticas de SAMU</h4>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th rowspan="2" colspan="2" class="align-middle">Tipo</th>
                            <th rowspan="2" class="align-middle">Total</th>
                            <th rowspan="2" class="align-middle">Beneficiarios</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th rowspan="2" class="align-middle">Samu</th>
                            <td>Básico</td>
                            <td class="text-center">{{ $L['BASIC']['TOTAL'] }}</td>
                            <td class="text-center">{{ $L['BASIC']['UNIQUE'] }}</td>
                        </tr>
                        <tr>
                            <td>Avanzado</td>
                            <td class="text-center">{{ $L['ADVANCED']['TOTAL'] }}</td>
                            <td class="text-center">{{ $L['ADVANCED']['UNIQUE'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>