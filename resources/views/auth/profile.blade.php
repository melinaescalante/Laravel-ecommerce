@extends('layouts.main')

@section('title', 'Mi perfil')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <h1 class="text-center mb-3 mt-5">Mi perfil</h1>
    <div class=" margin">
        <div class="card mx-auto" style="width: 22rem;">
            <div class="card-header" style="background-color:#008b8b42; ">
                Información
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        <p> {{$userData->email}}</p>

                        <a href="{{ route('user.edit.form') }}" class="btn btn-outline-success">Editar email</a>

                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        <p> {{$userData->name}}</p>
                        <form action="{{ route('user.edit.form.name') }}">

                            <button class="btn btn-outline-success">Editar nombre</button>
                        </form>
                    </div>
                </li>
              
            </ul>
        </div>
        @if (!empty($purchases))
            <h2 class="mx-auto">Mis compras</h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach ($purchases as $purchase)
                    <div class="card " style="width: 25rem;">
                        <div class="card-header"  style="background-color:#008b8b42; ">
                            Orden de compra: <strong>

                                #{{ $purchase["purchase"]->purchase_id}}
                            </strong>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Fecha de emisión: {{ $purchase['purchase']->release_date }}
                            </li>
                            <li class="list-group-item">
                                Estado: {{ $purchase['purchase']->status }}
                            </li>
                            <li class="list-group-item">

                                Juegos:
                                <ul>
                                    @foreach ($purchase['games'] as $game)
                                        <li>

                                            <strong>{{$game["game"]["title"] 
                                                                                                                    }}</strong> *
                                            {{$game["quantity"]}}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="list-group-item fs-5">
                                Monto final: <span style="color:darkcyan; ">{{$purchase['purchase']->amount}}</span> 
                            </li>



                    </div>
                @endforeach
                </ul>
            </div>
        @else
            <p>sin compras</p>
        @endif
    </div>
</div>
@endsection