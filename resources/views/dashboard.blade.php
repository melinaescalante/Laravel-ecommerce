@extends('layouts.main')

@section('title', 'Dashboard administrador')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <div class="row margin">
        <h1 class="text-center mt-5">Dashboard administrador</h1>
        <h2 class="text-center mt-3">Mirá tus estadísticas</h2>
      <div class="d-flex flex-wrap gap-3">

          <div class="card" style="width: 25rem;">
              <img src="{{$mostSold->getImage()}}" class="card-img-top" alt="...">
              <div class="card-body">
                  <h3 class="card-title"  style="color:darkcyan">Juego más vendido</h3>
                  
                  <h4 >Vendido {{$mostSoldGameTimes}} veces</h4>
                  <h5 >{{$mostSold->title}}</h5>
                  <p class="card-text">{{$mostSold->synopsis}}</p>
                  <a href="{{ route('games.view', ['id' => $mostSold->id_game]) }}" class="boton">Ver</a>
                  
                </div>
            </div>
            <div class="card" style="width: 25rem;">
                <img src="{{$lessSold->getImage()}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="card-title"  style="color:darkcyan">Juego menor vendido</h3>
                    
                    <h4 >Vendido {{$lessSoldGameTimes}} veces</h4>
                    <h5 >{{$lessSold->title}}</h5>
                    <p class="card-text">{{$lessSold->synopsis}}</p>
                    <a href="{{ route('games.view', ['id' => $lessSold->id_game]) }}" class="boton">Ver</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection