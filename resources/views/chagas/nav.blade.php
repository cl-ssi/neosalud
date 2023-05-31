<ul class="nav nav-tabs mb-3 d-print-none">
    @canany(['Developer', 'Administrator', 'Chagas:', 'Chagas: Administrador', 'Chagas: Solicitud', 'Chagas: Toma',
        'Chagas: Seguimiento', 'Chagas: Reportes'])
        <li class="nav-item">
            <a class="nav-link {{ active('chagas.welcome') }}" href="{{ route('chagas.welcome') }}"><i class="fas fa-home"></i>
                Home</a>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator', 'Chagas: Administrador', 'Chagas: Solicitud'])
        <li class="nav-item">
            <a class="nav-link {{ active('chagas.requestChaga') }}" href="{{ route('chagas.requestChaga') }}"><i
                    class="fas fa-file-alt"></i> Solicitud de Examen</a>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator', 'Chagas: Administrador', 'Chagas: Toma'])
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-vial"></i> Toma de muestra</a>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach (Auth::user()->practitioners as $practitioner)
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('chagas.sampleOrganization', ['organization' => $practitioner->organization]) }}">
                            <i class="fas fa-vial"></i> {{ $practitioner->organization->alias ?? '' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator', 'Chagas: Administrador', 'Chagas: Seguimiento'])
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-bell"></i> Seguimiento/Notificación</a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @foreach (Auth::user()->practitioners as $practitioner)
                    <li>
                        <a class="dropdown-item"
                            href="{{ route('chagas.tracings.index', ['organization' => $practitioner->organization]) }}">
                            <i class="fas fa-bell"></i> {{ $practitioner->organization->alias ?? '' }}
                        </a>
                    </li>
                @endforeach
            </ul>


            </a>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator', 'Chagas: Ficha'])
        <li class="nav-item">
            <a class="nav-link {{ active('chagas.patientRecord') }} " href="{{ route('chagas.patientRecord') }}"><i class="fa-solid fa-magnifying-glass-location"></i> Ficha Paciente</a>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator'])
        <li class="nav-item">
            <a class="nav-link " href="#"><i class="fas fa-chart-bar"></i> Reportes</a>
        </li>
    @endcanany

    @canany(['Developer', 'Administrator', 'Chagas: Administrador'])
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-cog"></i> Administrador</a>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('chagas.users.indexChagasUser') }}">
                        <i class="fas fa-user"></i> Usuarios Chagas de Mi Organización
                    </a>
                </li>

                <li>
                    <a class="dropdown-item" href="{{ route('chagas.delegateMail') }}">
                        <i class="fas fa-envelope"></i> Correo Encargado de Epidemiología
                    </a>
                </li>
            </ul>
        </li>
    @endcanany
</ul>
