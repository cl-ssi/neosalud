<h4 class="d-none d-print-block">SAMU</h4>

<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item" >
        <a class="nav-link {{ active('medical_programmer.welcome') }}"
        href=" {{ route('medical_programmer.welcome') }}"><i class="fas fa-home"></i> Home</a>
    </li>

    @canany(['Mp: programador'])
        <li class="nav-item">
            <a class="nav-link {{ active('medical_programmer.programming_proposal.index') }}" href="{{ route('medical_programmer.programming_proposal.index') }}">
                <span data-feather="chevrons-right"></span>
                Propuestas de programación<span class="sr-only">(current)</span>
            </a>
        </li>
    @endcan

    @canany(['Mp: programador'])

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
    @endcan

    @can('Mp: mantenedores')
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle {{ active(['samu.key.*','samu.mobile.*']) }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-cog"></i> Mantenedores
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('parameter.organization.index','Todas las organizaciones' ) }}">
                    <span data-feather="chevrons-right"></span>
                    Organizaciones
                </a>
            </li>

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

            <li>
                <a class="dropdown-item {{ active('medical_programmer.operating_rooms.index') }}" href="{{ route('medical_programmer.operating_rooms.index') }}">
                    <span data-feather="chevrons-right"></span>
                    Pabellones
                </a>
            </li>

            <li>
                <a class="dropdown-item {{ active('medical_programmer.mother_activities.index') }}" href="{{ route('medical_programmer.mother_activities.index') }}">
                    <span data-feather="chevrons-right"></span>
                    Actividades Madre
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
                    <!-- (Rdtos sugeridos) -->
                </a>
            </li>

            <li>
                <a class="dropdown-item {{ active('medical_programmer.professions.index') }}" href="{{ route('medical_programmer.professions.index') }}">
                    <span data-feather="chevrons-right"></span>
                    Profesiones
                    <!-- (Rdtos sugeridos) -->
                </a>
            </li>

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
    @endcan
</ul>
