@extends('layouts.main')

@section('title', 'Página de noticias')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 margin">

            <h1 class="text-center mt-5">Novedades</h1>
            <div class="container">
                               <div>
                    @foreach ($blogs as $blog)
                        <div class="card m-4">
                            <div class="card-header d-flex align-items-center background">

                                <div>
                                    <h2 class="mb-0 title">{{$blog->title}}</h2>
                                    <span class="text-muted">{{ $blog->date }}</span>
                                </div>
                            </div>

                            <div class="card-body">
                                <p class="card-text">
                                    {{ $blog->text }}
                                </p>
                            </div>
                            <div class="card-footer d-flex background flex-column">
                            @if ($blog->company)
                            
                            <p class="mb-1">{{$blog->company}}</p>
                            @endif    
                            @if ($blog->game)
                            
                            <p class="mb-1">{{$blog->game}}</p>
                            @endif    
                               
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>


@endsection