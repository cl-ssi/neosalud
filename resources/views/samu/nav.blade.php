<h4 class="d-none d-print-block">SAMU</h4>

@php
$disabled = (!App\Models\Samu\Shift::todayShiftVerify()) ? 'disabled':'';
@endphp

<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item">
        <a class="nav-link {{ active('samu.welcome') }}"
            href=" {{ route('samu.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    @canany(['SAMU administrador','SAMU regulador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active(['samu.shift.*']) }}"
            href=" {{ route('samu.shift.index') }}"> <i class="fas fa-blender-phone"></i> Turnos</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU regulador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobileinservice.*') }} {{ $disabled }}"
            href=" {{ route('samu.mobileinservice.index') }}"><i class="fas fa-ambulance"></i> Moviles en servicio</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU creador inventarios ambulancia','SAMU aprobador inventarios ambulancia'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobileinserviceinventory.*') }} {{ $disabled }}"
            href=" {{ route('samu.mobileinserviceinventory.index') }}"><i class="fa-solid fa-list"></i> Inventarios en Móviles</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU regulador','SAMU operador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.noveltie.*') }} {{ $disabled }}"
            href=" {{ route('samu.noveltie.index') }}"><i class="fas fa-book"></i> Novedades</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU operador','SAMU regulador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.call.create') }} {{ $disabled }}"
            href=" {{ route('samu.call.create') }}"><i class="fas fa-headset"></i> Llamadas</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU regulador'])
    <li class="nav-item">
        <a class="nav-link {{ active(['samu.call.index','samu.call.edit']) }} {{ $disabled }}"
            href=" {{ route('samu.call.index') }}"><i class="fas fa-clipboard-check"></i> Regulación</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU regulador','SAMU operador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.call.ots') }} {{ $disabled }}"
            href=" {{ route('samu.call.ots') }}"><i class="fas fa-phone"></i> OT</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU despachador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.event.index') }} {{ $disabled }}"
            href=" {{ route('samu.event.index') }}"><i class="fas fa-car-crash"></i> Despacho</a>
    </li>
    @endcan

    @canany(['be god'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.event.lw.index') }} {{ $disabled }}"
            href=" {{ route('samu.event.lw.index') }}"><i class="fas fa-car-crash"></i> Despacho V2</a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU despachador','SAMU regulador','SAMU operador'])
    <li class="nav-item">
        <a class="nav-link {{ active('samu.map') }}"
            href="{{ route('samu.map') }}" targe="_blank"><i class="fas fa-map"></i> </a>
    </li>
    @endcan

    @can('SAMU conductor')
    <li class="nav-item">
        <a class="nav-link {{ active('samu.mobiles.mobile_selector') }}"
            href="{{ route('samu.mobiles.mobile_selector') }}"><i class="fas fa-clock"></i></a>
    </li>
    @endcan

    @canany(['SAMU administrador','SAMU regulador'])
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ active(['samu.event.filter','samu.calls.search']) }}" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-search"></i> </a>
        <div class="dropdown-menu">

            <a class="dropdown-item {{ active('samu.event.filter') }}"
            href=" {{ route('samu.event.filter') }}"><i class="fas fa-car-crash"></i> Eventos </a>

            <a class="dropdown-item {{ active('samu.calls.search') }}"
            href=" {{ route('samu.call.search') }}"><i class="fas fa-phone"></i> Llamadas</a>

            <a class="dropdown-item {{ active('samu.shift.searcher') }}"
            href=" {{ route('samu.shift.searcher') }}"><i class="fas fa-blender-phone"></i> Buscador Turnos</a>

            <a class="dropdown-item {{ active('samu.coordinate.index') }}"
            href=" {{ route('samu.coordinate.index') }}"><i class="fas fa-globe"></i> Coordenadas Pacientes</a>

            <a class="dropdown-item {{ active('samu.dashboard') }}"
            href=" {{ route('samu.dashboard') }}"><i class="fas fa-chart-line"></i> Panel Estadísticas</a>

        </div>
    </li> -->

    <li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle {{ active(['samu.coordinate.index', 'samu.pre-hospital', 'samu.monitor']) }}"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-search"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item {{ active('samu.coordinate.index') }}" href="{{ route('samu.coordinate.index') }}">
                    <i class="fas fa-globe"></i> Coordenadas Pacientes
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.pre-hospital') }}" href="{{ route('samu.pre-hospital') }}">
                    <i class="fas fa-book-medical"></i> Hoja PreHospitalaria
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.monitor') }}" href="{{ route('samu.monitor') }}">
                    <i class="fas fa-user-injured"></i> Monitor de Pacientes
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle {{ active(['samu.dashboard', 'samu.event.filter', 'samu.event-by-month', 'samu.call.search', 'samu.shift.searcher']) }}"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-chart-line"></i>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item {{ active('samu.dashboard') }}" href="{{ route('samu.dashboard') }}">
                    <i class="fas fa-chart-line"></i> Panel Estadísticas
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.rem') }}" href="{{ route('samu.rem') }}">
                    <i class="fas fa-chart-line"></i> Estadísticas REM
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.minsal') }}" href="{{ route('samu.minsal') }}">
                    <i class="fas fa-chart-line"></i> Estadísticas MINSAL
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.event.filter') }}" href="{{ route('samu.event.filter') }}">
                    <i class="fas fa-car-crash"></i> Eventos
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.event-by-month') }}" href="{{ route('samu.event-by-month') }}">
                    <i class="fas fa-clipboard-list"></i> Eventos por Mes
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.call.search') }}" href="{{ route('samu.call.search') }}">
                    <i class="fas fa-phone"></i> Llamadas
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.shift.searcher') }}" href="{{ route('samu.shift.searcher') }}">
                    <i class="fas fa-blender-phone"></i> Buscador Turnos
                </a>
            </li>
        </ul>
    </li>
    @endcan

    @can('SAMU administrador')
    <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
            <i class="fas fa-cog"></i> </a>
        <div class="dropdown-menu">

            <a class="dropdown-item {{ active('samu.key.*') }}"
            href=" {{ route('samu.key.index') }}"><i class="fas fa-user-injured"></i> Codificación de las claves</a>

            <a class="dropdown-item {{ active('samu.mobile.*') }}"
            href=" {{ route('samu.mobile.index') }}"><i class="fas fa-ambulance"></i> Móviles</a>

            <a class="dropdown-item {{ active('samu.establishment.*') }}"
            href=" {{ route('samu.establishment.index') }}"><i class="fas fa-building"></i> Establecimientos</a>

            <a class="dropdown-item {{ active('samu.commune.*') }}"
            href=" {{ route('samu.commune.index') }}"><i class="fas fa-map"></i> Comunas</a>

            <a class="dropdown-item {{ active('user.*') }}"
            href=" {{ route('user.index') }}"><i class="fas fa-user"></i> Usuarios</a>
        </div>
    </li> -->

    <li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}"
            href="#"
            id="navbarDropdown"
            role="button"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-cog"></i> </a>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item {{ active('samu.key.*') }}" href=" {{ route('samu.key.index') }}">
                    <i class="fas fa-user-injured"></i> Codificación de las claves
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.mobile.*') }}" href=" {{ route('samu.mobile.index') }}">
                    <i class="fas fa-ambulance"></i> Móviles
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.establishment.*') }}" href=" {{ route('samu.establishment.index') }}">
                    <i class="fas fa-building"></i> Establecimientos
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.commune.*') }}" href=" {{ route('samu.commune.index') }}">
                    <i class="fas fa-map"></i> Comunas
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('user.*') }}" href=" {{ route('user.index') }}">
                    <i class="fas fa-user"></i> Usuarios
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.procedures') }}" href=" {{ route('samu.procedures') }}">
                    Procedimientos
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.morbid_history') }}" href=" {{ route('samu.morbid_history') }}">
                    Historiales mórbidos
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.alterations') }}" href=" {{ route('samu.alterations') }}">
                    Alteraciones
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.medicines') }}" href=" {{ route('samu.medicines') }}">
                    Medicamentos
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.supplies') }}" href=" {{ route('samu.supplies') }}">
                    Suministros
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ active('samu.glasgow_scale') }}" href=" {{ route('samu.glasgow_scale') }}">
                    Escala Glasgow
                </a>
            </li>
        </ul>
    </li>
    @endcan
</ul>