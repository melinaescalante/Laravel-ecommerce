<div>
    <nav class="navbar bg-body-tertiary navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse d-flex align-items-center gap-4" id="navMain">
                <x-navlink route="home" class="navbar-brand">Games</x-navlink>
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <x-navlink route="home">Home</x-navlink>
                    </li>
                    <li class="nav-item">
                        <x-navlink route="games">Juegos</x-navlink>

                    </li>
                    <li class="nav-item">
                        <x-navlink route="about">Nosotros</x-navlink>
                    </li>
                    <li class="nav-item">
                        <x-navlink route="blogs">Novedades</x-navlink>
                    </li>
                    @auth
                        @if (auth()->user()->email === 'meliescalantee@gmail.com')
                            <x-navlink route="users">Usuarios</x-navlink>
                            <x-navlink route="dashboard">Dashboard</x-navlink>


                        @endif
                    @endauth
                    @guest
                        <li class="nav-item">
                            <x-navlink route="login">Iniciar Sesión</x-navlink>
                            
                            
                        </li>
                        <li class="nav-item">
                            <x-navlink route="singUp">Registro</x-navlink>
                        </li>
                    @else
                        <x-navlink route="profile">Mi perfil</x-navlink>

                        <li class="nav-item">
                            <form action="{{route('auth.logout.process')}}" method="POST">
                                @csrf
                                <button class="nav-link">{{auth()->user()->email}}(Cerrar Sesión)</button>
                            </form>
                        </li>

                    @endguest
                </ul>
                <div class="text-end ms-auto">
                    <x-navlink route="cart.index">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10%" height="10%" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M6.3 5H21L19 12H7.38M20 16H8L6 3H3M9 20C9 20.55 8.55 21 8 21C7.45 21 7 20.55 7 20C7 19.45 7.45 19 8 19C8.55 19 9 19.45 9 20ZM20 20C20 20.55 19.55 21 19 21C18.45 21 18 20.55 18 20C18 19.45 18.45 19 19 19C19.55 19 20 19.45 20 20Z"
                                stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </x-navlink>
                </div>
            </div>
        </div>

    </nav>
</div>