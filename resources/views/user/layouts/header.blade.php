    <nav class="navbar navbar-expand-lg bg-orange-1 shadow-sm">
        <div class="container-fluid mx-3">
            <h1 class="navbar-brand text-white">OlympiaWorkout</h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item rounded px-2 @if($activeRoute === 'user.main')active @endif">
                        <a href="url('/user/main')" class="nav-link text-white">Inicio</a>
                    </li>
                    <li class="nav-item rounded px-2">
                        <a href="url('/user/exercises')" class="nav-link text-white">Exercícios</a>
                    </li>
                    <li class="nav-item rounded px-2">
                        <a href="url('/user/posts')" class="nav-link text-white">Postagens</a>
                    </li>
                    <li class="nav-item" style="border-left: 1px solid #eee;"></li>
                    @if($user->permissions->isTeacher())
                    <li class="nav-item button px-2">
                        <a href="" class="btn btn-outline-light">Painel do
                            {{ __('user/permissions.general_groups.'.$user->group()) }}</a>
                    </li>
                    @endif
                    <li class="nav-item dropdown px-2">
                        <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $user->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li>
                                <a class="dropdown-item"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deslogar</a>
                            </li>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>