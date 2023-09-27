@extends('layouts.app')

@section('content')
    
    <main style="background-image: url('{{ asset('images/image1.png') }}');" class="main">

        <section class="sectionWelcome">

            <div class="sectionWelcome__title">
                <span>Bienvenidos a</span>
                <br>
                <h1>RouteMaster</h1>
                <br>
                <span>Optimiza tus rutas con RouteMaster y llega a tu destino de la manera más rápida y eficiente posible. 
                <br> ¡Regístrate o inicia sesión y comienza a disfrutar!</span>
            </div>

            <div class="sectionWelcome__links">
                <a href="{{ route('login') }}">Inicia sesión</a>
                <a href="{{ route('register') }}" class="sectionWelcome__links--mod">Registrate</a>
            </div>

        </section>

    </main>
    
@endsection