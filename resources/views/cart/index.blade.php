@extends('layouts.main')

@section('title', 'Carrito de compras')

@section('content')

<x-nav></x-nav>
<div class="container">

    <div class="row margin">

        <h2 class="text-center mt-4">Carrito de compras</h2>
        <h3>Número de orden: {{ $purchasePendant->purchase_id }}</h3>
        <p class="fs-6 fw-bold mb-4">Detalle de Orden</p>
        <div style="overflow-x:auto;" class="mx-auto d-flex flex-column align-items-center">
            <table class="table-auto border-collapse mx-auto">
                <thead>
                    <tr class="border">
                        <!-- <th></th> -->
                        <th class="border  px-4 py-2 text-left">Producto</th>
                        <th class="border px-4 py-2 text-center">Cantidad</th>
                        <th class="border  px-4 py-2 text-center">Precio Unitario</th>
                        <th class="border px-4 py-2 text-center">Subtotal</th>
                        <th class="border  px-4 py-2 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($gamesWithQuantities as $item)
                        <tr>
                            <td class="border  px-4 py-2">
                                <div class="gap-3 d-flex flex-sm-column flex-lg-row align-items-center flex-wrap">

                                    <img height="50vh" width="50vh" src="{{$item['game']->getImage()}}"
                                        alt="{{$item['game']->title}}">
                                    <p><strong>{{$item['game']->title}}</strong></p>
                                </div>
                            </td>
                            <td class="border  px-4 py-2 text-center"> {{$item['quantity']}}</td>
                            <td class="border  px-4 py-2 text-center">{{$item['game']->price}}</td>
                            <td class="border px-4 py-2 text-center">
                                ${{$item['game']->price * $item['quantity']}}
                            </td>
                            <td class="border  px-4 py-2 text-center">
                                <div class="d-flex gap-1  flex-wrap">
                                    <form action="{{ route('games.add.cart', ['id' => $item['game']->id_game]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="source_page" value="cart">
                                        <button class="btn btn-outline-success">Añadir unidad</button>
                                    </form>
                                    <form action="{{ route('games.remove.from.cart', ['id' => $item['game']->id_game]) }}"
                                    
                                        method="post">
                                        @csrf
                                        <button class="btn btn-outline-danger">Eliminar unidad</button>
                                    </form>
                                </div>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="fs-5 border">
                        <td colspan="4" class="text-end fw-bold py-2">Total:</td>
                        <td class="text-center fw-bold text-success">
                            ${{ $purchasePendant->amount }}
                        </td>
                    </tr>
                </tfoot>

            </table>

        </div>
        <button class="btn boton mt-3 " style="width:100%">Ir a pagar</button>

    </div>
</div>

@endsection