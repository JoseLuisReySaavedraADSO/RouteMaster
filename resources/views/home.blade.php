@extends('layouts.app')

@section('content')
<div class="container">

    <div style="margin-left: 50px; margin-right: 30px">   
        @foreach ($locations as $location)
        <div style="position: absolute; left: {{ ($location->posX)*5 }}px; top: {{ ($location->posY)*5 }}px;">
            
            <img style="width: 30px" src="https://cdn-icons-png.flaticon.com/512/2776/2776067.png" alt="">
        </div>
    @endforeach
    </div>
</div>
@endsection
