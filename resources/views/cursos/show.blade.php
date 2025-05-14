@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Curso: {{ $curso->nome }}</h1>

    <div class="mb-3">
        <strong>Sigla:</strong> {{ $curso->sigla }}
    </div>

    <div class="mb-3">
        <strong>Carga Horária:</strong> {{ $curso->carga_horaria }} horas
    </div>

    <div class="mb-3">
        <strong>Categoria:</strong> {{ $curso->categoria->nome }}
    </div>

    <div class="mb-3">
        <strong>Nível:</strong> {{ $curso->nivel->nome }}
    </div>

    <div class="mb-3">
        <strong>Descrição:</strong> {{ $curso->descricao }}
    </div>

    <div class="mb-3">
        <strong>Valor:</strong> R$ {{ number_format($curso->valor, 2, ',', '.') }}
    </div>

    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>

    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
    </form>
</div>
@endsection
