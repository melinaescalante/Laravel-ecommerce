@extends('layouts.main')

@section('title', 'Página de usuarios')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 margin">

            <h1 class="text-center mt-5">Usuarios registrados</h1>
            <div class="container">
                <div>
                    <div style="overflow-x:auto;">
                        <table class="table-bordered table-striped table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Compras</th>


                                    @auth
                                        @if (auth()->user()->email === 'meliescalantee@gmail.com')
                                            <th>Acciones</th>
                                        @endif
                                    @endauth
                                </tr>

                                @foreach ($users as $user)
                                    <tr>
                                        <td class="align-top">{{ $user->id }}</td>

                                        <td class="align-top">{{ $user->name }}</td>
                                        <td class="align-top">{{ $user->email }}</td>
                                        <td class="align-top">
                                            @if ($user->gamesPurchased->isNotEmpty())
                                            
                                            @foreach ($user->gamesPurchased as $purchase)
                                            <div>
                                                
                                            <p class="bagde-secondary">
                                                <strong>Id de compra: </strong>{{$purchase->pivot->purchase_id}}</p>
                                            <p class="bagde-secondary">
                                                        <strong>Nombre del juego: </strong>{{$purchase->title}} </p>
                                            <p class="bagde-secondary">
                                                            <strong>Monto del juego: $</strong>{{$purchase->pivot->amount}}</p>
                                            </div>
                                            @endforeach
                                            @else
                                            <p>Sin compras aún</p>
                                            @endif
                                        </td>
                                        <td class="mt-2 mb-2">

                                            @auth
                                                @if (auth()->user()->email === 'meliescalantee@gmail.com')
                                                    <div class="d-flex justify-content-around">


                                                        <a href="#" class="btn btn-warning">Editar</a>
                                                        <form action="#" method="post">

                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Eliminar"
                                                                onclick="return confirm('Está seguro de borar la película?')"
                                                                class="btn btn-danger">
                                                        </form>

                                                    </div>
                                                @endif
                                            @endauth
                                        </td>
                                    </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection