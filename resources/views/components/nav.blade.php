<div>
    <nav class="navbar bg-body-tertiary navbar-expand-lg">
        <div class="container-fluid">
            <x-navlink route="home" class="navbar-brand">Games</x-navlink>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navMain">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-navlink route="home">Home</x-navlink>
                    </li>
                    <li class="nav-item">
                        <x-navlink route="games">Juegos</x-navlink>

                    </li>
                    <li class="nav-item">
                        <x-navlink  route="about">Nosotros</x-navlink>
                    </li>
                    <li class="nav-item">
                        <x-navlink  route="blogs">Novedades</x-navlink>
                    </li>
                    @auth
                            @if (auth()->user()->email === 'meliescalantee@gmail.com')
                            <x-navlink  route="users">Usuarios</x-navlink>
                            @endif
                        @endauth
                    @guest
                    <li class="nav-item">
                    <x-navlink  route="login">Iniciar Sesión</x-navlink>

                        <!-- <a class="nav-link" href="{{route('login')}}">Iniciar Sesión</a> -->

                    </li>
                    @else
                    <li class="nav-item">
                        <form action="{{route('auth.logout.process')}}" method="POST">
                        @csrf
                        <button class="nav-link">{{auth()->user()->email}}(Cerrar Sesión)</button>
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>

    </nav>
</div>
