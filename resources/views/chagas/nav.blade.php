<ul class="nav nav-tabs mb-3 d-print-none">
    <li class="nav-item">
        <a class="nav-link {{ active('chagas.welcome') }}" href=" {{ route('chagas.welcome') }}"><i
                class="fas fa-home"></i> Home</a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link {{ active(['chagas.tutorials.*']) }}" href=" {{ route('chagas.tutorials') }}"> <i
                class="fas fa-book-open"></i> Tutoriales</a>
    </li> --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-cog"></i> Administrador</a>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item {{ active('user.*') }}" href=" {{ route('user.index') }}">
                    <i class="fas fa-user"></i> Usuarios
                </a>
            </li>
        </ul>
    </li>
</ul>
