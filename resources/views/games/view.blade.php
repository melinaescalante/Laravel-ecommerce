@extends('layouts.main')
@section('title', $game->title)
<x-nav></x-nav>
<div class="container-fluid">
    <div class="row margin">
        <div class="col-8 m-auto">

            <h1 class="mb-3 mt-5" style="color:darkcyan">{{ $game->title }}</h1>
            @if ($game->cover)
                <div class="d-flex gap-3 align-items-start">
                    <div class="col-3">
                        
                        <img height="500px" width="500px" src="{{ $game->getImage() }}" alt="{{$game->cover_description}}" class="img-fluid">
                    </div>
                </div>
            @else
                <p>No hay portada</p>
            @endif
            <dl class="mb-5">
                <dt>Precio</dt>
                <dd class="mb-3">
                    {{ $game->price }}
                </dd>
                <dt>Sinopsis</dt>
                <dd class="mb-3">
                    {{ $game->synopsis }}
                </dd>
                <dt>Fecha de estreno</dt>
                <dd class="mb-3">
                    {{ $game->release_date }}
                </dd>
                <dt>Compañia</dt>
                <dd class="mb-3">
                    {{ $game->company }}
                </dd>
            </dl>
        </div>
    </div>
</div>
@section('content')
