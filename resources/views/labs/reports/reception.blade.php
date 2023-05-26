@extends('layouts.app')
@section('content')
    @include('labs.nav')
    <div class="container">
        <div class="my-4">
            <h4 class="mb-3">Total de muestras recepcionadas por año</h4>
            @foreach ($consolidatedData as $year => $total)
                <div class="alert alert-info mb-3" role="alert">
                    Total de muestras para el año {{ $year }}: {{ $total }}
                </div>
            @endforeach
        </div>

        <div class="my-4">
            <h4 class="mb-3">Reporte de Muestras Recepcionadas por Mes</h4>
            <div class="card">
                <div class="card-body">
                    <canvas id="receptionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var reportData = {!! $reportData !!};

        var labels = reportData.map(data => data.year + '-' + data.month);
        var counts = reportData.map(data => data.count);

        var ctx = document.getElementById('receptionChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Muestras Recepcionadas',
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
