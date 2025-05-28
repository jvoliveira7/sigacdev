@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Detalhes da Turma</h1>

    <div class="mb-4">
        <strong>ID:</strong> {{ $turma->id }}
    </div>
    <div class="mb-4">
        <strong>Ano:</strong> {{ $turma->ano }}
    </div>
    <div class="mb-4">
        <strong>Curso:</strong> {{ $turma->curso->nome ?? '—' }}
    </div>

    <a href="{{ route('turmas.edit', $turma) }}" class="text-yellow-600 hover:underline">Editar</a>
    <a href="{{ route('turmas.index') }}" class="ml-4 text-blue-600 hover:underline">Voltar</a>
</div>
@endsection
