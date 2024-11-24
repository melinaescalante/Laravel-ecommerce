@extends('layouts.main')
@section('title', 'Editar película ' . e($game->title))
@section('content')
    <?php $genreIds = $game->genres->pluck('genre_id')->all(); ?>
    <x-nav></x-nav>
    <div class="container margin">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-3 mt-3">
                    Editar película "{{ $game->title }}"
                </h1>
                @if ($errors->any())
                    <div class="alert alert-danger">Hay errores en los datos del formulario</div>
                @endif

                <form action="{{ route('games.edit.process', ['id' => $game->id_game]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Título:</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $game->title) }}">
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
                                <option value="{{ $rating->rating_id }}" @selected($rating->rating_id == old('rating_fk', $game->rating_fk))>
                                    {{ $rating->name }}-{{ $rating->abbreviation }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3">
                        <label for="synopsis" class="form-label">Sinopsis:</label>
                        <textarea id="synopsis" name="synopsis" class="form-control">{{ old('synopsis', $game->synopsis) }}</textarea>
                        @error('synopsis')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        @if ($game->cover !== null)
                            <label for="cover" class="form-label">Portada Actual:</label>
                            <div class="col-3">
                                <img src="{{ Storage::url($game->cover) }}" alt="{{ $game->cover_description }}"
                                    class="img-fluid">
                            </div>

                            <div class="mb-3">
                                <label for="cover_description" class="form-label">Portada descripcion Actual:</label>
                                <p>{{$game->cover_description}}
                            </p>

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
                        @else
                            <p>Sin portada</p>
                            <input type="file" id="cover" name="cover"
                                class="form-control">{{ old('cover') }}</input>
                            @error('cover')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label">Compañia:</label>
                        <input type="text" id="company" name="company" class="form-control"
                            value="{{ old('company', $game->company) }}">
                        @error('company')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="release_date" class="form-label">Fecha de estreno:</label>
                        <input type="date" id="release_date" name="release_date" class="form-control"
                            value="{{ old('release_date', $game->release_date->format('Y-m-d')) }}">
                        @error('release_date')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Precio:</label>
                        <input type="text" id="price" name="price" class="form-control"
                            value="{{ old('price', $game->price) }}">
                        @error('price')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <fieldset class="mb-3">
                        <legend>Generos</legend>
                        @foreach ($genres as $genre)
                            <input type="checkbox" name="genre_id[]" value="{{ $genre->genre_id }}"
                                @checked(in_array($genre->genre_id, old('genre_id', $genreIds)))>
                            {{ $genre->name }}
                        @endforeach
                    </fieldset>
                    <button type="submit" class="boton">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
