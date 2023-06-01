<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Salud Tarapacá') }}</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
            crossorigin="anonymous">

        <!-- Icons-->
        <link rel="apple-touch-icon" sizes="180x180" href="/icon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/icon/favicon-16x16.png">
        <link rel="manifest" href="/icon/site.webmanifest">
        @production
        <link rel="icon" type="image/vnd.microsoft.icon" href="/icon/favicon.ico">
        @else
        <link rel="icon" type="image/vnd.microsoft.icon" href="/icon/favicon-local.ico">
        @endproduction

        <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

        @stack('css')

    </head>
    <body class="c-app flex-row align-items-center">

        <div class="container">
            <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="text-center">
                        <div class="pb-4">
                            <h1 class="display-5 text-uppercase">Error @yield('code')</h1>
                        </div>

                        <table class="justify-content-center align-items-center">
                            <tr class="">
                                <td style="background-color: #491152;" width="300" height="5"></td>
                                <td style="background-color: #006cb7;" width="300" height="5"></td>
                            </tr>
                        </table>

                        <h2 class="pt-4 text-uppercase">@yield('title')</h4>
                        <p class="text-muted">@yield('message')</p>

                        <a href="{{ route('home') }}" class="link-primary">
                            <i class="fa fa-arrow-left"></i> IR AL INICIO
                        </a>
                        <div class="my-5">
                            <small>Servicio de Salud Tarapacá - {{ now()->format('Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
        crossorigin="anonymous"></script>

        <!-- Fontawesome -->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-mutate-approach="sync"></script>

        <!-- Javascript -->
        @stack('javascript')

    </body>
</html>
