@extends('layouts.main')

@section('title', 'Editar nombre')

@section('content')

<x-nav></x-nav>
<h1 class="text-center mb-3 mt-5">Editar nombre</h1>
<div class=" margin">
        <div class="container">
        <form action="{{ route('user.edit.name.process') }}" style="width:60%" class="mx-auto" method="post">
        @csrf
            <div class="mb-3">
                <label for="full_name" class="form-label">Nombre </label>
                <input type="text" class="form-control" id="full_name" name="full_name" >
                
            </div>
           
            <button type="submit" class="btn boton">Actualizar nombre</button>
        </form>
    </div>
</div>
@endsection