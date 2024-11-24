@extends('layouts.main')

@section('title', 'Pagina de inicio')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">
   <div class="row ">
        <div class="col-12">
            <h1 class="text-md-center text-sm-start  mt-5">Pagina de Venta de Videojuegos Online</h1>
            <div class="d-flex flex-column margin">

                <div class="row d-flex justify-content-md-center justify-content-sm-start align-items-center mt-4 background p-1 pt-5 pb-4 ">
                    
                <div class="col-lg-5 col-md-9 col-sm-12 d-flex flex-column ">

                    <p class="text-lg-center p-md-2 pb-2 p-sm-0 text-start mt-sm-4" >¡Bienvenido a nuestra tienda de videojuegos en línea! Aquí encontrarás los títulos más emocionantes y populares para todas las plataformas, desde los clásicos que siempre has amado hasta los lanzamientos más recientes. Nuestra misión es ofrecerte una experiencia de compra sencilla, segura y rápida, con un catálogo lleno de aventuras, acción, estrategia y diversión sin límites. Explora, elige tus juegos favoritos y sumérgete en un mundo de entretenimiento sin fin. ¡Tu próxima gran aventura empieza aquí!</p>
                    <p class="text-lg-center p-md-2 pt-0 p-sm-0 text-start" >¡Podras encontrar novedades como el <strong>"Diablo IV"</strong>, <strong>"Starfield"</strong> y muchos más! ¡A precios super accesibles, no te los pierdas!</p>
                </div>
                    <img src="/indexImg.jpeg" alt="Imagen de inicio, un joystick en la mano de una persona en frente a una computadora" style="border-radius:30px;" class="ms-sm-2 ps-md-0 col-lg-3 col-md-4 col-sm-6">
                    <div class="text-start text-md-center ps-md-4 ps-sm-2 mt-4">

                        <a class="boton"  href="{{route('games')}}">Comenzar a ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
