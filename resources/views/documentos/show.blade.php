@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Documento</h1>

    <div class="mb-4">
        <strong>Nome:</strong> {{ $documento->nome }}
    </div>
    <div class="mb-4">
        <strong>Tipo:</strong> {{ $documento->tipo }}
    </div>
    <div class="mb-4">
        <strong>Aluno:</strong> {{ $documento->aluno->nome ?? '—' }}
    </div>

    <a href="{{ route('documentos.edit', $documento->id) }}" class="text-yellow-600 hover:underline">Editar</a>
    <a href="{{ route('documentos.index') }}" class="ml-4 text-blue-600 hover:underline">Voltar</a>
</div>
@endsection
