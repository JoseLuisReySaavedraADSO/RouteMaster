@extends('layouts.app')

@section('content')
    {{-- <div class="container">
            @foreach ($locations as $location)
                <div style="position: absolute; left: {{ $location->posX * 5 }}px; top: {{ $location->posY * 5 }}px;">

                    <img style="width: 30px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt="">
                </div>
            @endforeach
    </div>

    <form action="{{ route('add') }}" method="post">
        <div style="margin-top: 460px">
            @csrf
            <label for="">nombre:</label>
            <input type="text" name="nombre">

            <label for="">Posicion x:</label>
            <input type="text" name="posx">

            <label for="">Posicion y:</label>
            <input type="text" name="posy">

            <button type="submit">Guardar</button>
        </div>
    </form>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div> --}}

    <main style="background-image: url('{{ asset('images/image2.png') }}');" class="main">

        @foreach ($locations as $location)
            <div style="position: absolute; left: {{ $location->posX * 5 }}px; top: {{ $location->posY * 5 }}px;">

                <img style="width: 30px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt="">
            </div>
        @endforeach

        <form class="formHome" action="{{ route('add') }}" method="post">
            @csrf
            <input class="formHome__input" type="text" name="nombre" placeholder="Punto" required>

            <input class="formHome__input" type="text" name="posx" placeholder="Posición X" required>

            <input class="formHome__input" type="text" name="posy" placeholder="Posición Y" required>

            <button class="formHome__button formHome__input" type="submit">Guardar</button>

            <button class="formHome__button formHome__input" type="">Calcular ruta</button>

        </form>

        <div class="button__logout" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                Cerrar Sesión
            </a>
    
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>

    </main>

@endsection
