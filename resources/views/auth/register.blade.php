@extends('layouts.app')

@section('title', '| REGISTRAR')

@section('content')

    <main style="background-image: url('{{ asset('images/image1.png') }}');" class="main">

        <section class="loginSection">

            <div class="loginSection__text">
                <h1>RouteMaster</h1>
                <span>elIGE TU MEJOR OPCIÓN Y LLEGA MÁS RÁPIDO A TU DESTINO</span>
            </div>

            <div class="loginSection__login">
                <h1>Registro</h1>
                <form class="container__form" method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="login__form">
                        <input id="name" type="text" class="form__input form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre de Usuario">

                        @error('name')
                            <span class="form__alert" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login__form">
                        <input id="email" type="email" class="form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo electrónico">

                        @error('email')
                            <span class="form__alert" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login__form">
                        <input id="password" type="password" class="form__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                        @error('password')
                            <span class="form__alert" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="login__form">
                        <input id="password-confirm" type="password" class="form__input form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                    </div>

                    <div class="login__form">
                        <button type="submit" class="form__input form__button">
                            Registrar
                        </button>
                    </div>

                    <p class="login__link">¿Ya posees una cuenta? 
                        <a href="{{ route('login') }}">Inicia Sesión</a>
                    </p>
                </form>

            </div>

        </section>

    </main>

@endsection
