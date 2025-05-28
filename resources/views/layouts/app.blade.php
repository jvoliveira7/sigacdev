<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <!-- Left: Menu Links -->
                <div class="flex space-x-6">
                    <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-gray-900 hover:underline">Dashboard</a>
                    <a href="{{ route('alunos.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Alunos</a>
                    <a href="{{ route('cursos.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Cursos</a>
                    <a href="{{ route('categorias.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Categorias</a>
                    <a href="{{ route('comprovantes.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Comprovantes</a>
                    <a href="{{ route('documentos.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Documentos</a>
                    <a href="{{ route('declaracoes.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Declarações</a>
                    <a href="{{ route('eixos.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Eixos</a>
                    <a href="{{ route('niveis.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Níveis</a>
                    <a href="{{ route('turmas.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Turmas</a>
                    <a href="{{ route('users.index') }}" class="text-sm font-semibold text-gray-900 hover:underline">Usuários</a>
                </div>

                <!-- Right: Auth Info -->
                <div class="flex items-center space-x-4">
                    <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-red-500 hover:underline">
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="py-6 px-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
