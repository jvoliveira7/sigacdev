@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Declaração #{{ $declaracao->id }}</h1>

    <p><strong>Usuário:</strong> {{ $declaracao->user->name ?? 'N/A' }}</p>
    <p><strong>Descrição:</strong> {{ $declaracao->descricao }}</p>

    <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
