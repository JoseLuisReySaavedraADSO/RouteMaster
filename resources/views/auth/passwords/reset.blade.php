@extends('layouts.app')

@section('title', '| RESTABLECER CONTRASEÑA')

@section('content')

<main style="background-image: url('{{ asset('images/image1.png') }}');" class="verifiedMain">

    <h1 class="verifiedMain__title">Restablece la contraseña</h1>

    <div class="verified__container verified__container--reset">

        <div class="verified__container--text">

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Dirección de correo') }}</label>

                <div class="login__form">
                    <input id="email" type="email" class="form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                <div class="login__form">
                    <input id="password" type="password" class="form__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>

                <div class="login__form">
                    <input id="password-confirm" type="password" class="form__input form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="verified__container--button">
                            {{ __('Restablecer contraseña') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

</main>

@endsection
