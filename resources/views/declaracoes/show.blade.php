@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Declaração</h1>

    <div class="mb-3">
        <strong>Aluno:</strong> {{ $declaracao->aluno->nome }}
    </div>

    <div class="mb-3">
        <strong>Tipo de Declaração:</strong> {{ $declaracao->tipo }}
    </div>

    <div class="mb-3">
        <strong>Data de Emissão:</strong> {{ $declaracao->created_at->format('d/m/Y') }}
    </div>

    <div class="mb-3">
        <a href="{{ route('declaracoes.download', $declaracao->id) }}" class="btn btn-info">Baixar Declaração</a>
    </div>

    <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
