@extends('layouts.app')

@section('content')
<link href="{{ asset('css/cu.min.css') }}" rel="stylesheet">

<div class="container row justify-content-md-center">
    <div class="col-12 col-md-6">
        <div class="card">
            
            <div class="card-header">
            {{ __('Iniciar sesión local') }}
            </div>

            <div class="card-body">

                <h4>Sólo para la certificacion de CU</h4>
                <p>Una vez certificado, este botón reemplazará al que está en {{ env('APP_URL') }}</p>

                <!-- Código para visualizar botón oficial iniciar sesión con ClaveÚnica-->
                <a class="btn-cu btn-m btn-color-estandar m-auto" 
                    href="{{ route('claveunica.login') }}"
                    title="Este es el botón Iniciar sesión de ClaveÚnica">
                    <span class="cl-claveunica"></span>
                    <span class="texto">Iniciar sesión</span>
                </a>
                <!--./ fin botón-->



                <!-- <form method="POST" action="{{ route('authenticate') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="run" class="form-label">{{ __('RUN') }}</label>
                        <input id="run" type="text" class="form-control @error('run') is-invalid @enderror"
                            name="run" value="{{ old('run') }}" required autocomplete="run" autofocus>
                        @error('run')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Clave') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                            name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" value=1 {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Recuerdame') }}</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">{{ __('Iniciar sesión') }}</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </form> -->
            </div>
        </div>
    </div>
</div>
@endsection
