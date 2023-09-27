@extends('layouts.app')

@section('title', '| INICIO')

@section('content')

    <main style="background-image: url('{{ asset('images/image2.png') }}');" class="main">

        @foreach ($locations as $location)
            <div style="position: absolute; left: {{ $location->posX * 5 }}px; top: {{ $location->posY * 5 }}px;"
                class="location-point" data-location-id="{{ $location->id }}">
                {{-- <img style="width: 30px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt=""> --}}

                <div class="open-popup-button" onclick="openPopup()">
                    <img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt="">
                </div>

                <div id="myPopup" class="popup">
                    <a class="close-popup-button" onclick="closePopup()">&times;</a>
                    <br>
                    <div>
                        <label for="nombre">Punto</label>
                        <input id="nombre" name="nombre" type="text" placeholder="Punto">
                    </div>
                    <div>
                        <label for="coorx">X</label>
                        <input id="coorx" name="coorx" type="text" placeholder="Posición X (MAX 265)" required min="0" max="265">
                    </div>
                    <div>
                        <label for="coory">Y</label>
                        <input id="coory" name="coory" type="text" placeholder="Posición Y (MAX 125)" required min="0" max="125">
                    </div>
                    <button type="submit" class="">
                        Actualizar
                    </button>
    
                    <button type="submit" class="">
                        Eliminar
                    </button>
                </div>

            </div>
        @endforeach

        <form id="calculate-route-form" class="formHome" action="{{ route('add') }}" method="post">
            @csrf
            <input class="formHome__input" type="text" name="nombre" placeholder="Punto" required>
            <input class="formHome__input" type="number" name="posx" placeholder="Posición X (MAX 265)" required min="0" max="265">
            <input class="formHome__input" type="number" name="posy" placeholder="Posición Y (MAX 125)" required min="0" max="125">
            <button class="formHome__button formHome__input" type="submit">Guardar</button>
            <input type="hidden" id="startLocation" name="startLocation" value="">
            <button class="formHome__button formHome__input calculate-route-button" type="submit">Calcular ruta</button>
        </form>

        {{-- <h1>Ruta óptima</h1>
        @if (isset($route))
            <ul>
                @foreach ($route as $locationId)
                    <li>{{ $locationId }}</li>
                @endforeach
            </ul>
        @else
            <p>No se ha calculado una ruta óptima todavía.</p>
        @endif --}}
        
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
