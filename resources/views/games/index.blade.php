@extends('layouts.main')

@section('title', 'Pagina de juegos')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">

    <div class="row margin">
        <div class="col-12">

            <div class="container">
                <div class="mb-3 mx-auto">

                    <h1 class="text-center mt-5 mb-5">Juegos disponibles</h1>
                    @auth
                        @if (auth()->user()->email === 'meliescalantee@gmail.com')
                            <div class="mb-3">
                                <a href="{{ route('games.create.form') }}" class="boton">Agregar un videojuego</a>
                            </div>
                        @endif
                    @endauth
                </div>
                <h2>Buscador</h2>
                <div class="mb-3">
                    <form action="{{ route('games') }}" method="get">
                        <label for="buscador">Buscador</label>
                        <div class="d-flex gap-3 align-items-end mb-3">
                            {{-- <div class=""> --}}
                                <input type="serach" name="buscador" id="buscador" class="form-control"
                                    value="{{ $searchParams['buscador'] }}">
                                <div>
                                    <label for="rating">Clasificación</label>
                                    <select name="rating" id="rating" class="form-select">
                                        <option value="">Todas</option>

                                        @foreach ($ratings as $rating)
                                            <option @selected($rating->rating_id == $searchParams['rating'])
                                                value="{{ $rating->rating_id }}">{{ $rating->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="boton">Buscar</button>
                                {{--
                            </div> --}}
                        </div>
                    </form>
                </div>
                @if (!empty($searchParams['buscador']))
                    <p class="mb-3 fst-italic">Mostrando resultados de la bùsqueda
                        <strong>{{ $searchParams['buscador'] }}</strong>
                    </p>
                @endif
                @if ($games->isNotEmpty())

                    <div style="overflow-x:auto;">
                        <table class="table-bordered table-striped table ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Precio</th>
                                    <th>Estreno</th>
                                    <th>Géneros</th>
                                    <th>Compañia</th>
                                    <th>Clasificación</th>
                                    <th>Acciones</th>

                                </tr>
                                @foreach ($games as $game)
                                    <tr>
                                        <td class="align-top">{{ $game->id_game }}</td>
                                        <td class="align-top"><a class="link"
                                                href="{{ route('games.view', ['id' => $game->id_game]) }}">{{ $game->title }}</a>
                                        </td>
                                        <td class="align-top">${{ $game->price }}</td>
                                        <td class="align-top">{{ $game->release_date }}</td>
                                        <td class="align-top">
                                            @foreach ($game->genres as $genre)
                                                <span class="badge bg-secondary">
                                                    {{ $genre->name }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td class="align-top">{{ $game->company }}</td>
                                        <td class="align-top">{{ $game->rating->name }}</td>
                                        <td class="mt-2 mb-2 d-flex flex-wrap gap-2">
                                            <a href="{{ route('games.view', ['id' => $game->id_game]) }}" class="boton">Ver</a>
                                            @auth
                                                @if (auth()->user()->email === 'meliescalantee@gmail.com')
                                                    <div class="d-flex justify-content-around">

                                                        <a href="{{ route('games.view', ['id' => $game->id_game]) }}"
                                                            class="boton">Ver</a>
                                                        <a href="{{ route('games.edit.form', ['id' => $game->id_game]) }}"
                                                            class="btn btn-warning">Editar</a>
                                                        <form action="{{ route('games.delete.process', ['id' => $game->id_game]) }}"
                                                            method="post">

                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Eliminar"
                                                                onclick="return confirm('Está seguro de borar la película?')"
                                                                class="btn btn-danger">
                                                        </form>
                                                        <form
                                                            action="{{ route('games.reservation.process', ['id' => $game->id_game]) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-warning">Reservar</button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <form action="{{ route('games.add.cart', ['id' => $game->id_game]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Añadir a carrito</button>
                                                    </form>
                                                @endif
                                            @endauth

                                        </td>
                                    </tr>
                                @endforeach
                            </thead>
                        </table>
                    </div>
                    {{$games->links()}}
                @else
                    <p>No se encontraron resultados</p>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection