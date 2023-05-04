<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item" >
        <a class="nav-link {{ active('medical_programmer.welcome') }}"
        href=" {{ route('medical_programmer.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    @canany(['Mp: perfil administrador', 'Mp: perfil referente programacion', 'Mp: perfil jefe de unidad', 'Mp: perfil ficha de programacion'])
    <li class="nav-item">
        <a class="nav-link {{ active('medical_programmer.programming_proposal.index') }}" href="{{ route('medical_programmer.programming_proposal.index') }}">
            <span data-feather="chevrons-right"></span>
            Fichas de programación<span class="sr-only">(current)</span>
        </a>
    </li>
    @endcanany

    



    @canany(['Mp: perfil administrador', 'Mp: perfil referente programacion', 'Mp: perfil jefe de unidad'])

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ active(['samu.event.filter','samu.calls.search']) }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-search"></i> Reportes
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('medical_programmer.programming_proposal.consolidated_programmings') }}">
                    <span data-feather="chevrons-right"></span>
                    Consolidado de programaciones<span class="sr-only">(current)</span>
                </a>
            </li>

            <li>
                <a class="dropdown-item" href="{{ route('medical_programmer.reports.pendingPractitionersReport') }}">
                    <span data-feather="chevrons-right"></span>
                    Funcionarios pendientes<span class="sr-only">(current)</span>
                </a>
            </li>

            
        </ul>
    </li>
    @endcanany

    @canany(['Mp: perfil administrador','Mp: perfil rrhh'])
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog"></i> Mantenedores
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @canany(['Mp: perfil administrador'])
                <li>
                    <a class="dropdown-item" href="{{ route('parameter.organization.index','Todas las organizaciones' ) }}">
                        <span data-feather="chevrons-right"></span>
                        Organizaciones
                    </a>
                </li>
            @endcanany

            @canany(['Mp: perfil administrador','Mp: perfil rrhh'])
                <li>
                    <a class="dropdown-item {{ active('medical_programmer.rrhh.index') }}" href="{{ route('medical_programmer.rrhh.index') }}">
                        <span data-feather="chevrons-right"></span>
                        RRHH
                    </a>
                </li>

                <li >
                    <a class="dropdown-item {{ active('medical_programmer.contracts.index') }}" href="{{ route('medical_programmer.contracts.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Contratos
                    </a>
                </li>
            @endcanany

            <!-- <li>
                <a class="dropdown-item {{ active('medical_programmer.operating_rooms.index') }}" href="{{ route('medical_programmer.operating_rooms.index') }}">
                    <span data-feather="chevrons-right"></span>
                    Pabellones
                </a>
            </li> -->

            @canany(['Mp: perfil administrador'])
                <li>
                    <a class="dropdown-item {{ active('medical_programmer.mother_activities.index') }}" href="{{ route('medical_programmer.mother_activities.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Actividades Madre
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.process.index') }}" href="{{ route('medical_programmer.process.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Procesos
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.activities.index') }}" href="{{ route('medical_programmer.activities.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Actividades
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.subactivities.index') }}" href="{{ route('medical_programmer.subactivities.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Sub-actividades
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.services.index') }}" href="{{ route('medical_programmer.services.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Servicios
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.specialties.index') }}" href="{{ route('medical_programmer.specialties.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Especialidades
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ active('medical_programmer.professions.index') }}" href="{{ route('medical_programmer.professions.index') }}">
                        <span data-feather="chevrons-right"></span>
                        Profesiones
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ active('patient.index') }}" href="{{ route('patient.index') }}">
                        <span data-feather="users"></span>
                        Buscar usuario<span class="sr-only">(current)</span>
                    </a>
                </li>
            @endcanany

            <!-- <li>
            <a class="dropdown-item {{ active('medical_programmer.cutoffdates.index') }}" href="{{ route('medical_programmer.cutoffdates.index') }}">
            <span data-feather="chevrons-right"></span>
            Fechas de corte
            </a>
            </li> -->

            <!-- <li>
            <a class="dropdown-item {{ active('medical_programmer.unscheduled_programming.index') }}" href="{{ route('medical_programmer.unscheduled_programming.index') }}">
            <span data-feather="chevrons-right"></span>
            Programación
            </a>
            </li> -->

            <!-- <li>
            <a class="dropdown-item {{ active('medical_programmer.clone.index') }}" href="{{ route('medical_programmer.clone.index') }}">
            <span data-feather="chevrons-right"></span>
            Clonar
            </a>
            </li> -->
          </ul>
    </li>
    @endcanany


    @canany(['Mp: perfil administrador', 'Mp: perfil referente programacion', 'Mp: perfil jefe de unidad', 'Mp: perfil ficha de programacion','Mp: perfil rrhh'])
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-solid fa-right-to-bracket"></i> Otros
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

        @canany(['Mp: perfil administrador','Mp: perfil rrhh'])
            <li >
                <a class="dropdown-item {{ active('medical_programmer.rrhh.importSirhFileView') }}" href="{{ route('medical_programmer.rrhh.importSirhFileView') }}">
                    <span data-feather="chevrons-right"></span>
                    Importar archivo SIRH
                </a>
            </li>
        @endcanany

        @canany(['Mp: perfil administrador', 'Mp: perfil referente programacion'])
            <li >
                <a class="dropdown-item {{ active('medical_programmer.unit_heads.index') }}" href="{{ route('medical_programmer.unit_heads.index') }}">
                    <span data-feather="chevrons-right"></span>
                    Jefes de unidad
                </a>
            </li>
        @endcanany

        @canany(['Mp: perfil administrador','Mp: perfil jefe de unidad'])
        <li >
            <a class="dropdown-item {{ active('medical_programmer.rrhh.assign_your_team') }}" href="{{ route('medical_programmer.rrhh.assign_your_team') }}">
                <span data-feather="chevrons-right"></span>
                Asigna tu equipo
            </a>
        </li>
        @endcanany

        @canany(['Mp: perfil administrador', 'Mp: perfil referente programacion'])
        <li >
            <a class="dropdown-item {{ active('medical_programmer.visator_users.index') }}" href="{{ route('medical_programmer.visator_users.index') }}">
                <span data-feather="chevrons-right"></span>
                Visadores
            </a>
        </li>
        @endcanany

        </ul>
    </li>
    @endcanany
    
</ul>
