<div>
    @include('samu.nav')

    <div class="container-fluid px-4 py-3">
        <!-- Encabezado y Acción de Exportar -->
        <div class="row align-items-center mb-4">
            <div class="col-md-8">
                <h2 class="mb-1 text-primary fw-bold">
                    <i class="fas fa-chart-line me-2"></i> Estadísticas de Transparencia SAMU
                </h2>
                <p class="text-muted mb-0">Indicadores operativos, tiempos de oportunidad y gestión de llamadas en atención prehospitalaria</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <button wire:click="exportTransparencyExcel" class="btn btn-success shadow-sm">
                    <i class="fas fa-file-excel me-1"></i> Exportar a Excel
                </button>
            </div>
        </div>

        <!-- Indicador de carga -->
        <div wire:loading.block class="text-center my-4 py-4">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <h5 class="text-muted mt-3">Calculando estadísticas de transparencia...</h5>
        </div>

        <!-- Transporte de datos para Chart.js -->
        <div id="transparency-data-holder"
             data-annual='@json($annualStats)'
             data-monthly='@json($monthlyStats)'
             data-year="{{ $selectedYear }}"
             style="display: none;">
        </div>

        <div wire:loading.remove>
            <!-- ======================================================== -->
            <!-- TABLA 1: INDICADORES ANUALES (HISTÓRICO POR AÑO) -->
            <!-- ======================================================== -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 text-dark fw-bold">
                            <i class="fas fa-calendar-alt text-primary me-2"></i> Indicadores de Transparencia por Año
                        </h5>
                        <small class="text-muted">Resumen histórico consolidado de los 6 indicadores institucionales</small>
                    </div>
                    <span class="badge bg-primary px-3 py-2 fs-6">Histórico Anual</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0 text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th class="align-middle">Año</th>
                                    <th class="align-middle bg-primary text-white">
                                        <i class="fas fa-clock me-1"></i> 1. Tiempo Promedio Respuesta
                                    </th>
                                    <th class="align-middle bg-info text-dark">
                                        <i class="fas fa-stopwatch me-1"></i> 2. Tiempo Respuesta P50 (Mediana)
                                    </th>
                                    <th class="align-middle bg-warning text-dark">
                                        <i class="fas fa-tachometer-alt me-1"></i> 3. Tiempo Respuesta P90
                                    </th>
                                    <th class="align-middle bg-secondary text-white">
                                        <i class="fas fa-hourglass-half me-1"></i> 4. Recepción a Despacho
                                    </th>
                                    <th class="align-middle">Total Llamadas Recibidas</th>
                                    <th class="align-middle">Llamadas con Despacho</th>
                                    <th class="align-middle">Llamadas Abandonadas</th>
                                    <th class="align-middle bg-danger text-white">
                                        <i class="fas fa-phone-slash me-1"></i> 5. Tasa de Abandono (%)
                                    </th>
                                    <th class="align-middle bg-success text-white">
                                        <i class="fas fa-ambulance me-1"></i> 6. % Despacho Prehospitalario
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($annualStats as $stat)
                                    <tr class="{{ $stat->year == $selectedYear ? 'table-active border-primary' : '' }}">
                                        <td class="fw-bold fs-6">
                                            {{ $stat->year }}
                                            @if($stat->year == $selectedYear)
                                                <span class="badge bg-primary ms-1">Activo</span>
                                            @endif
                                        </td>
                                        <!-- 1. Tiempo promedio respuesta -->
                                        <td class="fw-bold text-primary">{{ number_format($stat->avg_response_time, 2) }} min</td>
                                        <!-- 2. P50 -->
                                        <td class="fw-bold text-info">{{ number_format($stat->p50_response_time, 2) }} min</td>
                                        <!-- 3. P90 -->
                                        <td class="fw-bold text-danger">{{ number_format($stat->p90_response_time, 2) }} min</td>
                                        <!-- 4. Recepción a despacho -->
                                        <td class="fw-semibold">
                                            <span class="text-dark">{{ number_format($stat->avg_reception_to_dispatch_seconds, 1) }} seg</span>
                                            <br>
                                            <small class="text-muted">({{ number_format($stat->avg_reception_to_dispatch_minutes, 2) }} min)</small>
                                        </td>
                                        <!-- Llamadas -->
                                        <td>{{ number_format($stat->total_calls) }}</td>
                                        <td class="text-success fw-semibold">{{ number_format($stat->dispatched_calls) }}</td>
                                        <td class="text-danger fw-semibold">{{ number_format($stat->abandoned_calls) }}</td>
                                        <!-- 5. Tasa de abandono -->
                                        <td class="fw-bold text-danger fs-6">
                                            {{ number_format($stat->abandonment_rate, 2) }}%
                                        </td>
                                        <!-- 6. % Despacho -->
                                        <td class="fw-bold text-success fs-6">
                                            {{ number_format($stat->dispatch_percentage, 2) }}%
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-4 text-muted">
                                            No se registran datos disponibles
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- GRÁFICOS CHART.JS -->
            <!-- ======================================================== -->
            <div class="row mb-4">
                <!-- Gráfico 1: Tiempos de Respuesta (Promedio vs P50 vs P90) -->
                <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h5 class="mb-0 text-dark fw-bold">
                                <i class="fas fa-chart-line text-primary me-2"></i> Tiempos de Respuesta en Terreno (minutos)
                            </h5>
                            <small class="text-muted">1. Promedio, 2. P50 (Mediana) y 3. P90 desde despacho a llegada</small>
                        </div>
                        <div class="card-body">
                            <div wire:ignore style="position: relative; height: 320px; width: 100%;">
                                <canvas id="responseTimesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Gráfico 2: Tiempo Recepción a Despacho -->
                <div class="col-lg-6">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-header bg-white py-3 border-bottom">
                            <h5 class="mb-0 text-dark fw-bold">
                                <i class="fas fa-hourglass-half text-secondary me-2"></i> 4. Tiempo Promedio Recepción a Despacho
                            </h5>
                            <small class="text-muted">Tiempo transcurrido desde recepción de llamada hasta despacho de recurso (segundos)</small>
                        </div>
                        <div class="card-body">
                            <div wire:ignore style="position: relative; height: 320px; width: 100%;">
                                <canvas id="receptionToDispatchChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gráfico 3: Comparativo Despacho vs Abandono -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="mb-0 text-dark fw-bold">
                        <i class="fas fa-chart-pie text-success me-2"></i> 5 y 6. Gestión de Llamadas: % Despacho vs % Tasa de Abandono
                    </h5>
                    <small class="text-muted">Relación porcentual anual de llamadas que resultan en despacho vs llamadas abandonadas/no despachadas</small>
                </div>
                <div class="card-body">
                    <div wire:ignore style="position: relative; height: 320px; width: 100%;">
                        <canvas id="dispatchVsAbandonmentChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- ======================================================== -->
            <!-- TABLA 2: DESGLOSE MENSUAL DEL AÑO SELECCIONADO -->
            <!-- ======================================================== -->
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                    <div>
                        <h5 class="mb-0 text-dark fw-bold">
                            <i class="fas fa-calendar-day text-primary me-2"></i> Desglose Mensual - Año {{ $selectedYear }}
                        </h5>
                        <small class="text-muted">Detalle mes a mes de los indicadores de transparencia</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <label for="selectYearInput" class="form-label mb-0 fw-bold text-nowrap">Año Seleccionado:</label>
                        <select wire:model="selectedYear" id="selectYearInput" class="form-select form-select-sm w-auto">
                            @foreach($availableYears as $yr)
                                <option value="{{ $yr }}">{{ $yr }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover align-middle mb-0 text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mes</th>
                                    <th class="bg-primary text-white">1. Promedio (min)</th>
                                    <th class="bg-info text-dark">2. P50 (min)</th>
                                    <th class="bg-warning text-dark">3. P90 (min)</th>
                                    <th class="bg-secondary text-white">4. Recepción a Despacho</th>
                                    <th>Total Llamadas</th>
                                    <th>Llamadas Despachadas</th>
                                    <th>Llamadas Abandonadas</th>
                                    <th class="bg-danger text-white">5. Tasa Abandono</th>
                                    <th class="bg-success text-white">6. % Despacho</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($monthlyStats as $item)
                                    <tr>
                                        <td class="fw-semibold text-start ps-3">{{ $item->month_name }}</td>
                                        <td class="text-primary fw-bold">{{ number_format($item->avg_response_time, 2) }} min</td>
                                        <td class="text-info fw-bold">{{ number_format($item->p50_response_time, 2) }} min</td>
                                        <td class="text-danger fw-bold">{{ number_format($item->p90_response_time, 2) }} min</td>
                                        <td class="fw-semibold">
                                            {{ number_format($item->avg_reception_to_dispatch_seconds, 1) }} seg
                                            <br>
                                            <small class="text-muted">({{ number_format($item->avg_reception_to_dispatch_minutes, 2) }} min)</small>
                                        </td>
                                        <td>{{ number_format($item->total_calls) }}</td>
                                        <td class="text-success fw-semibold">{{ number_format($item->dispatched_calls) }}</td>
                                        <td class="text-danger fw-semibold">{{ number_format($item->abandoned_calls) }}</td>
                                        <td class="text-danger fw-bold">{{ number_format($item->abandonment_rate, 2) }}%</td>
                                        <td class="text-success fw-bold">{{ number_format($item->dispatch_percentage, 2) }}%</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center py-4 text-muted">
                                            No hay registros para el año {{ $selectedYear }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- JavaScript para Renderizado y Actualización de Gráficos -->
    <script>
        (function () {
            let chartTimes = null;
            let chartReception = null;
            let chartDispatchVsAbandon = null;

            function getData() {
                const holder = document.getElementById('transparency-data-holder');
                if (!holder) return { annual: [], monthly: [] };
                try {
                    return {
                        annual: JSON.parse(holder.dataset.annual || '[]'),
                        monthly: JSON.parse(holder.dataset.monthly || '[]'),
                        year: holder.dataset.year
                    };
                } catch (e) {
                    console.error('Error parseando datos:', e);
                    return { annual: [], monthly: [] };
                }
            }

            function renderCharts(data) {
                const annual = data.annual || [];
                const years = annual.map(item => 'Año ' + item.year);
                const avgTimes = annual.map(item => item.avg_response_time);
                const p50Times = annual.map(item => item.p50_response_time);
                const p90Times = annual.map(item => item.p90_response_time);
                const recToDispSec = annual.map(item => item.avg_reception_to_dispatch_seconds);
                const dispatchPerc = annual.map(item => item.dispatch_percentage);
                const abandonRate = annual.map(item => item.abandonment_rate);

                // 1. Gráfico de Tiempos de Respuesta
                const canvasTimes = document.getElementById('responseTimesChart');
                if (canvasTimes) {
                    if (chartTimes) chartTimes.destroy();

                    chartTimes = new Chart(canvasTimes, {
                        type: 'bar',
                        data: {
                            labels: years,
                            datasets: [
                                {
                                    label: '1. Promedio (min)',
                                    data: avgTimes,
                                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                                    borderColor: 'rgb(54, 162, 235)',
                                    borderWidth: 1,
                                    borderRadius: 4
                                },
                                {
                                    label: '2. P50 / Mediana (min)',
                                    data: p50Times,
                                    backgroundColor: 'rgba(75, 192, 192, 0.7)',
                                    borderColor: 'rgb(75, 192, 192)',
                                    borderWidth: 1,
                                    borderRadius: 4
                                },
                                {
                                    label: '3. P90 (min)',
                                    data: p90Times,
                                    backgroundColor: 'rgba(255, 99, 132, 0.7)',
                                    borderColor: 'rgb(255, 99, 132)',
                                    borderWidth: 1,
                                    borderRadius: 4
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'top' },
                                tooltip: {
                                    callbacks: {
                                        label: context => `${context.dataset.label}: ${context.parsed.y} min`
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Minutos' }
                                }
                            }
                        }
                    });
                }

                // 2. Gráfico de Tiempo Recepción a Despacho
                const canvasReception = document.getElementById('receptionToDispatchChart');
                if (canvasReception) {
                    if (chartReception) chartReception.destroy();

                    chartReception = new Chart(canvasReception, {
                        type: 'bar',
                        data: {
                            labels: years,
                            datasets: [{
                                label: '4. Tiempo Recepción a Despacho (seg)',
                                data: recToDispSec,
                                backgroundColor: 'rgba(108, 117, 125, 0.7)',
                                borderColor: 'rgb(108, 117, 125)',
                                borderWidth: 1,
                                borderRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'top' },
                                tooltip: {
                                    callbacks: {
                                        label: context => {
                                            const sec = context.parsed.y;
                                            const min = (sec / 60).toFixed(2);
                                            return `Promedio: ${sec} seg (${min} min)`;
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: { display: true, text: 'Segundos' }
                                }
                            }
                        }
                    });
                }

                // 3. Gráfico de Despacho vs Abandono (%)
                const canvasDispatchVsAbandon = document.getElementById('dispatchVsAbandonmentChart');
                if (canvasDispatchVsAbandon) {
                    if (chartDispatchVsAbandon) chartDispatchVsAbandon.destroy();

                    chartDispatchVsAbandon = new Chart(canvasDispatchVsAbandon, {
                        type: 'bar',
                        data: {
                            labels: years,
                            datasets: [
                                {
                                    label: '6. % Despacho Prehospitalario',
                                    data: dispatchPerc,
                                    backgroundColor: 'rgba(40, 167, 69, 0.75)',
                                    borderColor: 'rgb(40, 167, 69)',
                                    borderWidth: 1,
                                    borderRadius: 4
                                },
                                {
                                    label: '5. % Tasa de Abandono',
                                    data: abandonRate,
                                    backgroundColor: 'rgba(220, 53, 69, 0.75)',
                                    borderColor: 'rgb(220, 53, 69)',
                                    borderWidth: 1,
                                    borderRadius: 4
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'top' },
                                tooltip: {
                                    callbacks: {
                                        label: context => `${context.dataset.label}: ${context.parsed.y}%`
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100,
                                    title: { display: true, text: 'Porcentaje (%)' }
                                }
                            }
                        }
                    });
                }
            }

            document.addEventListener('livewire:load', function () {
                renderCharts(getData());

                if (window.Livewire && Livewire.hook) {
                    Livewire.hook('morph.updated', function () {
                        renderCharts(getData());
                    });
                    Livewire.hook('message.processed', function () {
                        renderCharts(getData());
                    });
                }

                window.addEventListener('statistics-updated', function (event) {
                    if (event.detail) {
                        renderCharts({
                            annual: event.detail.annualStats,
                            monthly: event.detail.monthlyStats,
                            year: event.detail.selectedYear
                        });
                    }
                });
            });
        })();
    </script>
</div>
