@extends('layouts.app')

@section('title', '| INICIO')

@section('content')

    <main style="background-image: url('{{ asset('images/image2.png') }}');" class="main">

        @foreach ($locations as $location)
            <div style="position: absolute; left: {{ ($location->posX + $maxX) * 5 }}px; top: {{ ($maxY - $location->posY) * 5 }}px;"
                class="location-point" data-location-id="{{ $location->id }}">

                <div class="open-popup-button" onclick="openPopup('{{ $location->id }}')">
                    <img style="width: 20px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt="">
                    <p class="name__point">{{ $location->id }}</p>
                </div>

                <div>

                    <form action="{{ route('update', $location->id) }}" method="POST">
                        @csrf
                        <div id="myPopup_{{ $location->id }}" class="popup">
                            <a class="close-popup-button" onclick="closePopup('{{ $location->id }}')">&times;</a>
                            <br>

                            <div class="popup__container">
                                <div>
                                    <label for="nombre_{{ $location->id }}">Punto</label>
                                    <input class="formHome__input formHome__input--mod" id="nombre_{{ $location->id }}"
                                        name="nombre" type="text" value="{{ $location->nombre }}">
                                </div>
                                <div>
                                    <label for="coorx_{{ $location->id }}">X</label>
                                    <input class="formHome__input formHome__input--mod" id="coorx_{{ $location->id }}"
                                        name="posx" type="text" value="{{ $location->posX }}" required min="0"
                                        max="265">
                                </div>
                                <div>
                                    <label for="coory_{{ $location->id }}">Y</label>
                                    <input class="formHome__input formHome__input--mod" id="coory_{{ $location->id }}"
                                        name="posy" type="text" value="{{ $location->posY }}" required min="0"
                                        max="125">
                                </div>

                            </div>
                            <button type="submit" class="formHome__button formHome__button--mod formHome__input ">
                                Actualizar
                            </button>

                            <a href="#" class="delete button__delete"
                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $location->id }}').submit();">
                                Eliminar
                            </a>

                        </div>
                    </form>

                    {{-- <a href="#" class="delete"
                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $location->id }}').submit();">Delete</a> --}}
                    <form id="delete-form-{{ $location->id }}" action="{{ route('delete', $location->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </div>

            </div>
        @endforeach

        <div class="formHome">

            <form class="formHome__mod" id="calculate-route-form" action="{{ route('add') }}" method="post">
                @csrf
                <input class="formHome__input" type="text" name="nombre" placeholder="Punto" required>
                <input class="formHome__input" type="number" name="posx" placeholder="Posición X (MAX 265)" required
                    min="" max="265">
                <input class="formHome__input" type="number" name="posy" placeholder="Posición Y (MAX 125)" required
                    min="" max="125">
                <button class="formHome__button formHome__input" type="submit">Guardar</button>

            </form>

            <form id="calculate-route-form" action="{{ 'calculate' }}" method="POST">
                @csrf
                <input class="formHome__input" type="hidden" id="startLocation" name="startLocation" value="">
                <button class="formHome__button formHome__input calculate-route-button" type="submit">Calcular
                    ruta</button>
            </form>

            <button class="formHome__button formHome__input" id="openFormButton">Subir JSON</button>

            <div id="uploadFormPopup">
                <form method="POST" action="{{ route('upload-json') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="jsonFile">
                    <button type="submit">Subir JSON</button>
                </form>
                <button id="closeFormButton">X</button>
            </div>

            <script>
                // Obtén una referencia al botón "Subir JSON" y al formulario popup
                var openFormButton = document.getElementById("openFormButton");
                var uploadFormPopup = document.getElementById("uploadFormPopup");
                var closeFormButton = document.getElementById("closeFormButton");

                // Agrega un manejador de eventos para abrir el popup cuando se hace clic en el botón
                openFormButton.addEventListener("click", function() {
                    uploadFormPopup.style.display = "block";
                });

                // Agrega un manejador de eventos para cerrar el popup cuando se hace clic en el botón "Cerrar"
                closeFormButton.addEventListener("click", function() {
                    uploadFormPopup.style.display = "none";
                });
            </script>

        </div>

        <div class="endRoute">

            <h1>Ruta óptima:</h1>
            {{-- {{dd($route);}} --}}
            @if (isset($route) && count($route) > 0)
                <ul>
                    <?php $count = count($route); ?>
                    @foreach ($route as $index => $locationId)
                        @if ($index < $count)
                            <li>{{ $locationId }}</li>
                        @endif
                    @endforeach
                </ul>
            @else
                @if (session('message'))
                    <p>{{ session('message') }}</p>
                @else
                    <p>No se ha calculado una ruta óptima todavía.</p>
                @endif

            @endif

            @if (isset($totalWeight))
                <h1>Peso total:</h1>
                <p>{{ $totalWeight }}</p>
            @endif
        </div>

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
