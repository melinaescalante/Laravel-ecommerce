@extends('layouts.main')

@section('title', 'Dashboard administrador')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <div class="row margin">
        <h1 class="text-center mt-5">Dashboard administrador</h1>
        <h2 class="text-center mt-3 mb-3">Mirá tus estadísticas</h2>
        <div class="d-flex flex-wrap gap-3">
            @if (isset($mostSold, $mostSoldGameTimes))

                <div class="card" style="width: 25rem;">
                    <img src="{{$mostSold->getImage()}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title" style="color:darkcyan">Juego más vendido</h3>

                        <h4>Vendido {{$mostSoldGameTimes}} veces</h4>
                        <h5>{{$mostSold->title}}</h5>
                        <p class="card-text">{{$mostSold->synopsis}}</p>
                        <a href="{{ route('games.view', ['id' => $mostSold->id_game]) }}" class="boton">Ver</a>

                    </div>
                </div>
                @else
                <p class="text-center mx-auto">Sin registros aún sobre juegos más vendidos porque no hay compras o muchos registros.</p>

            @endif
      
            @if (isset($lessSoldGameTimes, $lessSold))

                <div class="card" style="width: 25rem;">
                    <img src="{{$lessSold->getImage()}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title" style="color:darkcyan">Juego menos vendido</h3>

                        <h4>Vendido {{$lessSoldGameTimes}} veces</h4>
                        <h5>{{$lessSold->title}}</h5>
                        <p class="card-text">{{$lessSold->synopsis}}</p>
                        <a href="{{ route('games.view', ['id' => $lessSold->id_game]) }}" class="boton">Ver</a>
                    </div>
                </div>
                @else
                <p class="text-center mx-auto">Sin registros aún sobre juegos menos veces no vendidos porque no hay compras o muchos registros.</p>

            @endif
        
            @if(isset($gamesNotSaled))
                <div class="card" style="width: 25rem;">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h3 class="card-title" style="color:darkcyan">Juegos sin vender</h3>
                        @foreach ($gamesNotSaled as $gameNotSaled)
                            <a class="text-decoration-none" href="{{route('games.view', ['id' => $gameNotSaled->id_game])}}">
                                <p class="card-text fw-bold m-2 ms-0" style="color:#689797">

                                    {{$gameNotSaled->title}}
                                </p>
                            </a>

                        @endforeach

                    </div>
                </div>
            @else
                <p class="text-center mx-auto">Sin registros aún sobre juegos no vendidos porque no hay compras o muchos registros.</p>

            @endif
          
        </div>
    </div>
</div>
@endsection