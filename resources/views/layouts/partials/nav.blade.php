@auth
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          {{--
            <li class="nav-item">
                <a class="nav-link {{ active(['profile.show', 'profile.edit']) }}" href="{{ route('profile.show') }}">
                <i class="fas fa-user fa-fw"></i>
                    Mi perfíl
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                <i class="fas fa-home fa-fw"></i>
                    Dashboard
                </a>
            </li>

          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file" class="align-text-bottom"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart" class="align-text-bottom"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users" class="align-text-bottom"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2" class="align-text-bottom"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers" class="align-text-bottom"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="fas fa-file-text fa-fw"></i>
              Year-end sale
            </a>
          </li>
        --}}

            <!--SAMU-->
            @canany(['SAMU'])
            <li class="nav-item">
                <a class="nav-link {{ active('samu.*') }}" href="{{ route('samu.welcome') }}">
                    <i class="fas fa-ambulance fa-fw"></i> SAMU
                </a>
            </li>
            @endcanany

            @canany(['Mp: user'])
            <li class="nav-item">
                <a class="nav-link {{ active('medical_programmer.*') }}" href="{{ route('medical_programmer.welcome') }}">
                    <i class="fa fa-user-md"></i> PROGRAMADOR MÉDICO
                </a>
            </li>
            @endcanany

        </ul>

        <ul class="nav flex-column">
            <li class="nav-item border-top">
                @if(session()->has('god'))
                    <a class="nav-link" href="{{ route('user.switch', session('god')) }}">
                        <span class="text-danger" data-feather="eye"></span>
                        God Like
                    </a>
                @endif
                <a class="nav-link" href="{{ route('claveunica.logout') }}">
                    <span data-feather="log-out"></span>
                    Cerrar sesión
                </a>
            </li>
        </ul>
      </div>
    </nav>
    @endauth
