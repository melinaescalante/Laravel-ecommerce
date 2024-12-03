@extends('layouts.main')

@section('title', 'Editar email')

@section('content')

<x-nav></x-nav>
<h1 class="text-center mb-3 mt-5">Editar email</h1>
<div class=" margin">
        <div class="container">
        <form action="{{ route('user.edit.process') }}" style="width:60%" class="mx-auto" method="post">
        @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="@">
                
            </div>
           
            <button type="submit" class="btn boton">Actualizar email</button>
        </form>
    </div>
</div>
@endsection