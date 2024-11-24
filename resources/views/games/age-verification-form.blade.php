@extends('layouts.main')

@section('title', 'Página de verificacion de edad')

@section('content')
    <x-nav></x-nav>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 mt-3">Verificacion de edad</h1>
                <p class="mb-3"><b>{{ $game->title }}</b> esta clasificacion como apto a partir de 18 años de edad.</p>
                <form action="{{ route('games.age-verification.process', ['id' => $game->id_game]) }}" method="post">
                    @csrf
                    <a href="{{ route('games') }}" class="btn btn-danger">No, soy menor</a>
                    <button type="submit" class="btn btn-success">Si soy mayor de edad</button>
                </form>
            </div>
        </div>
    </div>
@endsection
