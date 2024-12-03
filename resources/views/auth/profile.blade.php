@extends('layouts.main')

@section('title', 'Mi perfil')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
    <h1 class="text-center mb-3 mt-5">Mi perfil</h1>
    <div class=" margin">
        <div class="card mx-auto" style="width: 22rem;">
            <div class="card-header">
                Información
            </div>
            <ul class="list-group list-group-flush">

                <li class="list-group-item">
                    <div class="d-flex align-items-center justify-content-between">
                        <p> {{$userData->email}}</p>

                        <a href="{{ route('user.edit.form') }}"
                            class="btn btn-outline-success">Editar email</a>

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
                <!-- <li class="list-group-item">A third item</li> -->
            </ul>
        </div>
    </div>
</div>
@endsection