<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        
        <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
        <link href="{{ asset('css/nunito.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('css/ssi.css') }}" rel="stylesheet">

        <!-- Favicons -->
        <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
        <link rel="manifest" href="/icon/site.webmanifest">
        @production
        <link rel="icon" type="image/vnd.microsoft.icon" href="/icon/favicon.ico">
        @else
        <link rel="icon" type="image/vnd.microsoft.icon" href="/icon/favicon-local.ico">
        @endproduction

        <!-- programador -->
        @yield('custom_js_head')

        @livewireStyles
    </head>
    <body>

        @livewireScripts

        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow d-print-none">
            <a class="navbar-brand @production ssi-rojo @else ssi-morado @endproduction col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{ route('home') }}">Servicio de Salud</a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="navbar-nav">
                <div class="nav-item text-nowrap">
                @if(auth()->check())
                <a class="nav-link px-3" href="#">{{ Auth::user()->officialName }}</a>
                @endif
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
        
                @include('layouts.partials.nav')
                        
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                    <h4 class="d-none d-print-block">{{ env('APP_NAME') }}</h4>
                    
                    <div class="mb-3"></div>

                    @include('layouts.partials.errors')
                    @include('layouts.partials.flash_message')

                    @yield('content', $slot ?? '')
                </main>
            </div>
        </div>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>
        <script>
            feather.replace()
        </script>

        @yield('custom_js')

        @stack('scripts')
        
        <script type="text/javascript">
            $(document).ready(function () {
                $('form').submit(function(){
                    $('input[type=submit]', this).attr('disabled', 'disabled');
                    $('button[type=submit]', this).attr('disabled', 'disabled');
                });

                $(".collapse-menu").on("shown.bs.collapse", function () {
                    localStorage.setItem("coll_" + this.id, true);
                    $('#icon_'+this.id).replaceWith(feather.icons['minus-circle'].toSvg());
                    console.log('SHOW ' + this.id);
                });

                $(".collapse-menu").on("hidden.bs.collapse", function () {
                    localStorage.removeItem("coll_" + this.id);
                    $('#icon_'+this.id).replaceWith(feather.icons['plus-circle'].toSvg());
                    console.log('HIDE ' + this.id);
                });

                $(".collapse-menu").each(function () {
                    console.log('EACH ' + this.id);
                    if (localStorage.getItem("coll_" + this.id) === "true") {
                        $(this).collapse("show");
                    }
                    else {
                        $(this).collapse("hide");
                    }
                });
            });

        </script>

    </body>
</html>
