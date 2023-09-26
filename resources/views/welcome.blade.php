<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/mainStyle.css') }}">
    {{-- @extends('layouts.app') --}}
</head>

<body>
    
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
    
</body>


</html>