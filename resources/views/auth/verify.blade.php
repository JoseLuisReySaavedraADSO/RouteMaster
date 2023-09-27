@extends('layouts.app')

@section('content')

<main class="verifiedMain">

    <h1 class="verifiedMain__title">Bienvenido a Route<span class="verifiedMain__title--span">Master</span></h1>

    <div class="verified__container">

        <div class="verified__container--title">{{ __('Por favor, verifique su email') }}</div>

        <div class="verified__container--text">
            @if (session('resent'))
                <div class="verified__container--title" role="alert">
                    {{ __('Se ha enviado un nuevo enlace de verificación a su correo') }}
                </div>
            @endif

            {{ __('Antes de continuar, consulte su correo para obtener el enlace verificación') }}
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="verified__container--button">{{ __('Reenviar correo') }}</button>
            </form>
        </div>

    </section>

</main>

@endsection