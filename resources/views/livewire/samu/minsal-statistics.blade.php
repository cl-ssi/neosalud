@include('samu.nav')
<div>
    <h1 class="text-center mb-4">Estadísticas MINSAL {{ $year }}</h1>
    
    <div class="container">
        <!-- Selector de año -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-4">
                <label for="year" class="form-label">Seleccionar Año:</label>
                <select wire:model="year" class="form-select">
                    @for($i = 2020; $i <= now()->year; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        @if($loading)
            <div class="text-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
                <p>Cargando estadísticas...</p>
            </div>
        @else
            <!-- 1. Máximos de Salidas SAMU -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">1. Máximos de Salidas por Mes (Solo SAMU)</h5>
                    <button wire:click="exportMaxSamuExits" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Total de Salidas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['max_samu_exits'] as $item)
                                <tr>
                                    <td>{{ $item->month_name }}</td>
                                    <td class="text-center">{{ $item->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2. Promedio de Salidas SAMU -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">2. Promedio Diario de Salidas por Mes (Solo SAMU)</h5>
                    <button wire:click="exportAverageSamuExits" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Total Salidas</th>
                                    <th>Días del Mes</th>
                                    <th>Promedio Diario</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['average_samu_exits'] as $item)
                                <tr>
                                    <td>{{ $item->month_name }}</td>
                                    <td class="text-center">{{ $item->total }}</td>
                                    <td class="text-center">{{ $item->days_in_month }}</td>
                                    <td class="text-center">{{ $item->average_daily }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 3. Tiempo de Respuesta a Emergencias -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">3. Promedio de Tiempo de Respuesta a Emergencias (minutos)</h5>
                    <button wire:click="exportAverageResponseTime" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Tipo de Emergencia</th>
                                    <th>Mes</th>
                                    <th>Tiempo Promedio (min)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['average_response_time'] as $emergencyType => $monthlyData)
                                    @foreach($monthlyData as $item)
                                    <tr>
                                        <td>{{ $emergencyType }}</td>
                                        <td>{{ $item->month_name }}</td>
                                        <td class="text-center">{{ $item->avg_response_time }}</td>
                                    </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 4. Llamadas Gestionadas -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">4. Llamadas Gestionadas por Mes</h5>
                    <button wire:click="exportManagedCalls" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Total Llamadas Gestionadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['managed_calls'] as $item)
                                <tr>
                                    <td>{{ $item->month_name }}</td>
                                    <td class="text-center">{{ $item->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 5. Llamadas Despachadas -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">5. Llamadas Despachadas por Mes</h5>
                    <button wire:click="exportDispatchedCalls" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Total Llamadas Despachadas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['dispatched_calls'] as $item)
                                <tr>
                                    <td>{{ $item->month_name }}</td>
                                    <td class="text-center">{{ $item->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 6. Porcentaje de Despacho -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">6. Porcentaje de Despacho de Móviles</h5>
                    <button wire:click="exportDispatchPercentage" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th>Llamadas Gestionadas</th>
                                    <th>Llamadas Despachadas</th>
                                    <th>Porcentaje (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['dispatch_percentage'] as $item)
                                <tr>
                                    <td>{{ $item->month_name }}</td>
                                    <td class="text-center">{{ $item->managed }}</td>
                                    <td class="text-center">{{ $item->dispatched }}</td>
                                    <td class="text-center">{{ $item->percentage }}%</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 7. Pacientes Únicos Atendidos -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">7. Pacientes Únicos Atendidos</h5>
                    <button wire:click="exportUniquePatients" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h4 class="text-center">{{ $statistics['unique_patients'] }}</h4>
                        <p class="text-center mb-0">Total de pacientes únicos atendidos en {{ $year }}</p>
                    </div>
                </div>
            </div>

            <!-- 8. Pacientes Únicos por Clasificación -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">8. Pacientes Únicos por Clasificación</h5>
                    <button wire:click="exportUniquePatientsByClassification" class="btn btn-primary btn-sm">
                        <i class="fas fa-download"></i> Exportar Excel
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Clasificación</th>
                                    <th>Total Pacientes Únicos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($statistics['unique_patients_by_classification'] as $classification => $count)
                                <tr>
                                    <td>{{ $classification }}</td>
                                    <td class="text-center">{{ $count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

