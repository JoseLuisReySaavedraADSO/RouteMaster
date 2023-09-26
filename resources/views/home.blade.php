@extends('layouts.app')

@section('content')
    <div class="container">
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
@endsection
