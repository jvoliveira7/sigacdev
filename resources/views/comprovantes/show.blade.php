@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Comprovante</h1>

    <p><strong>Descrição:</strong> {{ $comprovante->descricao }}</p>
    <p><strong>Aluno:</strong> {{ $comprovante->aluno->nome ?? 'N/A' }}</p>
    <p><strong>Arquivo:</strong> <a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Visualizar</a></p>

    <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
