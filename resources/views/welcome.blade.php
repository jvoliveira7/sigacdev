<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo ao SIGAC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold mb-6">Bem-vindo ao SIGAC</h1>

        @auth
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full max-w-4xl px-4">

                <a href="{{ route('alunos.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Alunos
                </a>
                <a href="{{ route('categorias.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Categorias
                </a>
                <a href="{{ route('cursos.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Cursos
                </a>
                <a href="{{ route('niveis.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Níveis
                </a>
                <a href="{{ route('turmas.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Turmas
                </a>
                <a href="{{ route('documentos.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Documentos
                </a>
                <a href="{{ route('comprovantes.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Comprovantes
                </a>
                <a href="{{ route('declaracoes.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                    Declarações
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block bg-red-100 rounded shadow p-4 text-center hover:bg-red-200 transition">
                    Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        @else
            <p class="mb-4">Você precisa estar autenticado para acessar o sistema.</p>
            <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Fazer Login</a>
        @endauth
    </div>
</body>
</html>
