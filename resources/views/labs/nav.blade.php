<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item">
        <a class="nav-link {{ active('labs.welcome') }}" href=" {{ route('labs.welcome') }}"><i class="fas fa-home"></i>
            Home</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle
            href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-bug"></i>
            Chagas
        </a>
        
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="{{ route('labs.chagas.index','Todas las Solicitudes') }}">
                    <i class="fas fa-list"></i> Todas las Solicitudes
                </a>
            </li>
            <li>
                <a class="dropdown-item"  href="{{ route('labs.chagas.index','Finalizadas') }}">
                    <i class="fas fa-check-circle"></i> Finalizadas
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('labs.chagas.index','Pendientes de Recepción') }}">
                    <i class="fas fa-inbox"></i> Pendientes de Recepción
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('labs.chagas.index','Pendientes de Resultado') }}">
                    <i class="fas fa-clock"></i> Pendientes de Resultado
                </a>
            </li>
        </ul>
    </li>




</ul>
