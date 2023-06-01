@extends('layouts.app')

@section('content')
    @include('chagas.nav')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('chagas.reports.chagasRequest', ['organization' => $selectedOrganization->id ?? '0']) }}"
                method="GET">

                <div class="form-group">
                    <label for="organization">Organización:</label>
                    <select name="organization" id="organization" class="form-select">
                        <option value="">Seleccione una organización</option>
                        @foreach ($organizations as $org)
                            <option value="{{ $org->id }}"
                                {{ $selectedOrganization && $selectedOrganization->id == $org->id ? 'selected' : '' }}>
                                {{ $org->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Generar Reporte</button>
            </form>

            @if ($selectedOrganization)
                <hr>
                <h4 class="mb-3 text-center">Total de muestras recepcionadas por año para el establecimiento:
                    {{ $selectedOrganization->alias }}</h4>

                <div class="my-4">
                    <h6 class="mb-3">Reporte de Muestras Solicitadas por Mes</h6>
                    <div class="card">
                        <div class="card-body">
                            <canvas id="receptionChart_request"></canvas>
                        </div>
                    </div>
                    <hr>
                    <h6 class="mb-3">Reporte de Muestras Tomadas por Mes</h6>
                    <div class="card">
                        <div class="card-body">
                            <canvas id="receptionChart_sample"></canvas>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('custom_js')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var reportData = {!! json_encode($reportData_request) !!};

        var labels = reportData.map(data => data.year + '-' + data.month);
        var counts = reportData.map(data => data.count);

        var ctx = document.getElementById('receptionChart_request').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Muestras Solicitadas',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>


    <script>
        var reportData = {!! json_encode($reportData_sample) !!};

        var labels = reportData.map(data => data.year + '-' + data.month);
        var counts = reportData.map(data => data.count);

        var ctx = document.getElementById('receptionChart_sample').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Muestras Tomadas',
                    data: counts,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
@endsection
