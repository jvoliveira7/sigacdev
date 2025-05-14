<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Bem-vindo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-4xl font-bold mb-6">Bem-vindo ao SIGAC</h1>

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
            <a href="{{ route('comprovantes.store') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                Enviar Comprovante
            </a>
            <a href="{{ route('declaracoes.index') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                Declarações
            </a>
            <a href="{{ route('relatorios.alunos') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                Relatório de Alunos
            </a>
            <a href="{{ route('relatorios.turmas') }}" class="block bg-white rounded shadow p-4 text-center hover:bg-blue-100 transition">
                Relatório de Turmas
            </a>
        </div>
    </div>
</body>
</html>
