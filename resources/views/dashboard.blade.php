@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex flex-col items-center justify-center p-6 bg-gray-100 text-gray-800">
        <h1 class="text-4xl font-bold mb-8">SIGAC</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 w-full max-w-5xl px-4">
            <a href="{{ route('alunos.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Alunos
            </a>
            <a href="{{ route('categorias.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Categorias
            </a>
            <a href="{{ route('cursos.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Cursos
            </a>
            <a href="{{ route('niveis.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Níveis
            </a>
            <a href="{{ route('turmas.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Turmas
            </a>
            <a href="{{ route('documentos.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Documentos
            </a>
            <a href="{{ route('comprovantes.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Comprovantes
            </a>
            <a href="{{ route('declaracoes.index') }}" class="block bg-white rounded shadow p-6 text-center hover:bg-blue-100 transition">
                Declarações
            </a>
        </div>
    </div>
@endsection
