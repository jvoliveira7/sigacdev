<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sistema Acadêmico')</title>

    <!-- Bootstrap 5 CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Estilos adicionais -->
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Sistema</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                @auth
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('alunos.index') }}">Alunos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('cursos.index') }}">Cursos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('turmas.index') }}">Turmas</a></li>
                    <!-- Adicione outras seções conforme necessário -->
                </ul>
                @endauth

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link">Olá, {{ Auth::user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link btn btn-link" type="submit">Sair</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Entrar</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mb-5">
        @yield('content')
    </main>

    <footer class="bg-light text-center py-3 mt-auto">
        <div class="container">
            <span class="text-muted">© {{ date('Y') }} - Sistema Acadêmico</span>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts adicionais -->
    @yield('scripts')
</body>
</html>
