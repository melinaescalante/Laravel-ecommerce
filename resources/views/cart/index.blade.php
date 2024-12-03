@extends('layouts.main')

@section('title', 'Carrito de compras')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">

    <div class="row margin">
        <div class="col-12">

            <h2 class="text-center mt-4">Carrito de compras</h2>
            <div class="container">
                <div style="overflow-x:auto;">
                    <table class="table-bordered table-striped table ">
                        <thead>
                            <tr>
                                <th>Número de compra</th>
                                <th>Juegos</th>
                              
                                <th>Monto</th>
                            </tr>
                            <tr>
                                <td class="align-top">{{ $purchasePendant->purchase_id }}</td>

                                <td class="align-top">

                                    @foreach ($gamesWithQuantities as $gameArray )
                              
                                            <div class="d-flex flex-wrap gap-3 align-items-center mb-2 justify-content-bettwen">
                                                <img class="" height="15%" width="15%" src="{{$gameArray['game']->getImage()}}" alt="Portada de juego{{$gameArray['game']->title}}">
                                                <p>{{$gameArray['game']->title}}</p>
                                        
                                                
                                                
                                                
                                  
                                            </div>
                                            @endforeach
                            
                                </td>
                                
                                <td class="align-top">${{$purchasePendant->amount}}</td>
                            </tr>
                        </thead>
                    </table>
                </div>


            </div>
        </div>
    </div>
</div>

@endsection