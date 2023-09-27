@extends('layouts.app')

@section('title', '| INICIAR SESIÓN')

@section('content')

    <main style="background-image: url('{{ asset('images/image1.png') }}');" class="main">

        <section class="loginSection" >

            <div class="loginSection__text">
                <h1>RouteMaster</h1>
                <span>elIGE TU MEJOR OPCIÓN Y LLEGA MÁS RÁPIDO A TU DESTINO</span>
            </div>

            <div class="loginSection__login">
                <h1>Iniciar Sesión</h1>
                <form class="container__form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login__form">

                        <input id="email" type="email" class="form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo eletrónico">

                        @error('email')
                            <span class="form__alert" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="login__form">

                        <input id="password" type="password" class="form__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">

                        @error('password')
                            <span class="form__alert" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="login__form">
                        <button type="submit" class="form__input form__button">
                            INGRESAR
                        </button>

                        {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif --}}
                    </div>

                    <p class="login__link">¿Aún no poseen una cuenta? 
                        <a href="{{ route('register') }}">Registrate</a>
                    </p>

                </form>
            </div>

        </section>

    </main>

@endsection
