@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comprovante #{{ $comprovante->id }}</h1>

    <p><strong>Aluno:</strong> {{ $comprovante->aluno->nome }}</p>
    <p><strong>Tipo:</strong> {{ $comprovante->tipo }}</p>
    <p><strong>Enviado em:</strong> {{ $comprovante->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Arquivo:</strong>
        <a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Visualizar</a>
    </p>

    <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
