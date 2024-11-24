@extends('layouts.main')

@section('title', 'Pagina de nosotros')

@section('content')

<x-nav></x-nav>
<div class="container-fluid">

    <div class="row margin">
        <div class="col-12 mt-5">

            <h1 class="text-center mt-5">Acerca de Nosotros</h1>
            <div class="col-10 col-lg-7 text-center mx-auto">
                <p>En Games, somos una tienda creada por y para gamers apasionados. Nos dedicamos a
                    ofrecer los videojuegos más aclamados por la comunidad, con los lanzamientos más recientes y
                    esperados. Nos apasiona todo lo relacionado con el gaming, y trabajamos para que encuentres en un
                    solo lugar los títulos que marcarán tendencia. Nuestro objetivo es brindarte la mejor experiencia de
                    compra, rápida, confiable y adaptada a tus necesidades, porque sabemos lo que significa ser parte de
                    este increíble mundo.</p>
            </div>
            <div class="d-flex justify-content-center gap-5 row mt-5">
                <h2 class="text-center mt-5">Nuestras caracteristicas</h2>


                <div class="col-10  col-md-2 col-lg-3 card">
                    <img src="/joystick.svg" class="card-img-top mt-4 mb-2" alt="joystick" type="svg" style="height:5rem">
                    <div class="card-body">
                        <h5 class="card-title">Apasionados por los videojuegos</h5>
                        <p class="card-text">Somos gamers como tú. Conocemos la emoción de esperar ese juego que llevas meses deseando jugar, y estamos aquí para hacer que esa experiencia sea lo más emocionante posible.</p>
                    </div>
                </div>
                <div class="col-10 col-md-2 col-lg-3 card">
                <img src="/heart.svg" class="card-img-top mt-4 mb-2" alt="Heart" type="svg" style="height:5rem">
                    <div class="card-body">
                        <h5 class="card-title">Nuestros valores</h5>
                        <p class="card-text">Nos guiamos por la innovación y la calidad en todo lo que hacemos. Valoramos la conexión con nuestra comunidad gamer y siempre buscamos nuevas formas de mejorar la experiencia de juego para nuestros clientes.</p>
           
                    </div>
                </div>
                <div class="col-10 col-md-2 col-lg-3 card" >
                    <img src="/call-center.svg" class="card-img-top mt-4 mb-2" alt="Icono call center" type="svg" style="height:5rem">
                    <div class="card-body">
                        <h5 class="card-title">Experiencia del Cliente</h5>
                        <p class="card-text">Queremos que tu experiencia de compra sea tan increíble como los videojuegos que ofrecemos. Nos aseguramos de brindarte un servicio rápido y confiable, para que puedas empezar a jugar lo antes posible.</p>
                        
                    </div>
                </div>
                <!-- <div class="d-flex justify-content-center gap-5  mt-5"> -->
                    
                    <div class="col-10  col-md-2 col-lg-3  card">
                        <img src="/vision.svg" class="card-img-top mt-4 mb-2" alt="Icono de visión" type="svg" style="height:5rem">
                        <div class="card-body">
                            <h5 class="card-title">Visión</h5>
                            <p class="card-text">Nos esforzamos por ser la plataforma líder en la venta de videojuegos, siempre a la vanguardia de las tendencias y manteniendo una estrecha conexión con nuestra comunidad gamer.</p>
                            
                        </div>
                    </div>
                    <div class="col-10 col-md-2  col-lg-3 card" >
                        <img src="/mission.svg" class="card-img-top mt-4 mb-2" alt="Icono misión" type="svg" style="height:5rem">
                        <div class="card-body">
                            <h5 class="card-title">Misión</h5>
                            <p class="card-text">Nuestra misión es conectar a la comunidad gamer con los títulos más esperados, ofreciendo una experiencia de compra fluida y accesible para los verdaderos entusiastas de los videojuegos.</p>
                            
                        </div>
                    </div>
                    <div class="col-10 col-md-2 col-lg-3  card">
                        <img src="/industry.svg" class="card-img-top mt-4 mb-2" alt="Icono de una empresa" type="svg" style="height:5rem">
                        <div class="card-body">
                            <h5 class="card-title">Historia de la Empresa</h5>
                            <p class="card-text">Nacimos de la pasión por los videojuegos y la necesidad de brindar a la comunidad gamer un lugar donde encontrar los títulos más aclamados y esperados. Desde entonces, hemos crecido junto a nuestros clientes, adaptándonos a los cambios en la industria.</p>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
    
    @endsection