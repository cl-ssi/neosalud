<div>
    @include('samu.nav')
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Horas de Mobiles en Servicio </h5>
<!--             <button wire:click="" class="btn btn-primary btn-sm">
                <i class="fas fa-download"></i> Exportar Excel
            </button> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            
                            <th>Mobil</th>
                            <th>Horas Basico Segun Dotacion</th>
                            <th>Horas Basico D  isponibles</th>
                            <th>Horas Avanzado Segun Dotacion</th>
                            <th>Horas Avanzado Disponibles</th>
                            <th>Horas Totales Segun Dotacion</th>                            
                            <th>Horas Totales Disponibles</th>                            
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($mobiles as $mobile)
                        <tr>
                            <td>{{ $mobile['code'] }}</td>
                            <td>{{ $mobile['basico']}}</td>
                            <td>{{ $mobile['basicoCE']}}</td>
                            <td>{{ $mobile['avanzado']}}</td>
                            <td>{{ $mobile['avanzadoCE']}}</td>
                            <td>{{ $mobile['total']}}</td>
                            <td>{{ $mobile['totalCE']}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <th>Totales</th>
                            <th>{{ $totales['TotalBasicos'] }}</th>
                            <th>{{ $totales['TotalBasicosCE'] }}</th>
                            <th>{{ $totales['TotalAvanzados'] }} ({{ $this->calculatePercentage($totales['TotalAvanzados'], $totales['TotalFinal']) }}%)</th>
                            <th>{{ $totales['TotalAvanzadosCE'] }} ({{ $this->calculatePercentage($totales['TotalAvanzadosCE'], $totales['TotalFinalCE']) }}%)</th>
                            <th>{{ $totales['TotalFinal'] }}</th>
                            <th>{{ $totales['TotalFinalCE'] }}</th>
                        </tr>
                        <tr>
                            <th>Porcentajes</th>
                            <th colspan="2" class="text-center"> ({{ $this->calculatePercentage($totales['TotalBasicosCE'], $totales['TotalBasicos']) }}%) </th>
                            <th colspan="2" class="text-center">({{ $this->calculatePercentage($totales['TotalAvanzadosCE'], $totales['TotalAvanzados']) }}%)</th>
                            <th colspan="2" class="text-center">({{ $this->calculatePercentage($totales['TotalFinalCE'], $totales['TotalFinal']) }}%)</th>                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>