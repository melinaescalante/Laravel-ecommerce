@extends('layouts.main')
@section('title', 'Agregar una nueva película')
@section('content')
    <x-nav></x-nav>
    <div class="container">
        <div class="row margin">
            <div class="col-12">
                <h1 class="mb-3 mt-3">
                    Agregar una película
                </h1>
                @if ($errors->any())
                    <div class="alert alert-danger">Hay errores en los datos del formulario</div>
                @endif
                <form action="{{ route('games.create.process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating_fk" class="form-label">Clasificacion:</label>
                        <select name="rating_fk" id="rating_fk" class="form-select">
                            @foreach ($ratings as $rating)
                                <option value="{{ $rating->rating_id }}">{{ $rating->name }}-{{ $rating->abbreviation }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Sinopsis:</label>
                        <textarea id="synopsis" name="synopsis" class="form-control">{{ old('synopsis') }}</textarea>
                        @error('synopsis')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover" class="form-label">Portada:</label>
                        <input type="file" id="cover" name="cover" class="form-control">{{ old('cover') }}</input>
                        @error('cover')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="cover_description" class="form-label">Portada descripcion:</label>
                        <input type="text" id="cover_description" name="cover_description" class="form-control" value="{{old('cover_description')}}"/>
                        @error('cover_description')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Compañia:</label>
                        <input type="text" id="company" name="company" class="form-control"
                            value="{{ old('company') }}">
                        @error('company')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Fecha de estreno:</label>
                        <input type="date" id="release_date" name="release_date" class="form-control"
                            value="{{ old('release_date') }}">
                        @error('release_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="number" id="price" name="price" class="form-control"
                            value="{{ old('price') }}">
                        @error('price')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <fieldset class="mb-3">
                        <legend>Generos</legend>
                        @foreach ($genres as $genre)
                            <input
                            type="checkbox"
                            name="genre_id[]"
                            value="{{ $genre->genre_id }}" @checked(in_array($genre->genre_id, old('genre_id', [])))>
                            {{ $genre->name }}

                        @endforeach
                    </fieldset>
                    <button type="submit" class="boton">Agregar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
