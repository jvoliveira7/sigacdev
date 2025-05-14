@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes do Nível: <span class="badge bg-primary">{{ $nivel->nome }}</span></h1>

    <div class="mb-3">
        <strong>Descrição:</strong> <p>{{ $nivel->descricao ?? 'Nenhuma descrição fornecida.' }}</p>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-warning">Editar</a>

        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display:inline-block">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este nível?')">Excluir</button>
        </form>
    </div>
</div>
@endsection
