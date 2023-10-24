<div>
    @include('samu.nav')

    <h3 class="mb-2">
        <i class="fas fa-chart-line"></i> Panel de Estadísticas
    </h3>

    <div class="row mb-2">
        <div class="col-sm">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos atendidos en los últimos 30 días
                </h6>
                <div class="card-body">
                    @livewire('samu.dashboard.event-last-month')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm">
            <div class="card">
                <h6 class="card-header">
                   Tiempo promedio llegada de la móvil al sitio en los últimos 12 meses
                </h6>
                <div class="card-body">
                    @livewire('samu.dashboard.avg-mobile-arrival')
                </div>
                <div class="card-footer">
                    <small>
                        El tiempo promedio en minutos que transcurre entre todos aquellos cometidos que tenga definido las marcas de tiempo "Salida móvil" y "Llegada al lugar".
                    </small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-sm">
            <div class="card">
                <h6 class="card-header">
                   Total de llamadas por clasificación
                </h6>
                <div class="card-body">
                    @livewire('samu.dashboard.calls-by-classification')
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="row mb-2">
        <div class="col-12 col-md-6">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos atendidos por comuna
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-commune')
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos atendidos agrupados por sexo
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-gender')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos atendidos por móviles
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-mobile')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos atendidos en los últimos 12 meses
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-month')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    # Mensual de Eventos por Tipo de Móvil
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-mobile-type-monthly')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    # de Eventos por Tipo de Móvil
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-mobile-type')
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    Promedio de Tipo de Móvil las últimas 4 semanas
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.avg-type-mobile')
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    Cantidad de horas por tipo de móvil y por tipo de funcionario
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.mobile-type-by-job-type')
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h6 class="card-header">
                    Promedio en minutos de Retención de Ambulancia en AP
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.average-ambulance-retention')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-2">
            <div class="card">
                <h6 class="card-header">
                    # Eventos por género y grupo etarios
                </h6>
                <div class="card-body pt-2">
                    @livewire('samu.dashboard.event-by-gender-and-age')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="mb-2">
            <div class="card">
                <h6 class="card-header">
                    # Eventos por prevision
                </h6>
                <div class="card-body">
                    @livewire('samu.dashboard.event-by-prevision')
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @livewire('samu.stadistic')
    </div>
</div>
