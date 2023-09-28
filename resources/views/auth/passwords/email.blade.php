@extends('layouts.app')

@section('title', '| RECUPERAR CONTRASEÑA')

@section('content')

<main style="background-image: url('{{ asset('images/image1.png') }}');" class="verifiedMain">

    <h1 class="verifiedMain__title">Recupera tú contraseña</h1>

    <div class="verified__container verified__container--reset">

        <div class="verified__container--title">{{ __('Restablece la contraseña') }}</div>

        <div class="verified__container--text">

            @if (session('status'))
                <div class="verified__container--title" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <label for="email" class="">{{ __('Dirección de correo') }}</label>

                <div class="login__form">
                    <input id="email" type="email" class="form__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="verified__container--button">
                            {{ __('Enviar enlace para restablecer contraseña') }}
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>

</main>


@endsection
