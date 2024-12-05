@extends('layouts.main')
@section('title', 'Registro')
@section('content')
<x-nav></x-nav>
    <div class="container-fluid">
        <div class="row mt-5 margin">
            <div class="col-md-6 col-11 m-auto mt-5">

                <h1 class="mb-3 mt-3">
                    Crear una cuenta
                </h1>
                <form action="{{route('auth.singUp.process')}}" method="post" class="border p-5 rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" id="password" class="form-control"">
                    </div>
                    <button type="submit" class="boton">Registrarme</button>
                </form>

            </div>
        </div>
    </div>
@endsection
