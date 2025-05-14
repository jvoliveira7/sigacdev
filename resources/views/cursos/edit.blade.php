@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso: {{ $curso->nome }}</h1>

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $curso->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" name="sigla" id="sigla" class="form-control" value="{{ $curso->sigla }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $curso->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nível</label>
            <select name="nivel_id" id="nivel_id" class="form-control" required>
                @foreach($niveis as $nivel)
                    <option value="{{ $nivel->id }}" {{ $nivel->id == $curso->nivel_id ? 'selected' : '' }}>
                        {{ $nivel->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="carga_horaria" class="form-label">Carga Horária</label>
            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" value="{{ $curso->carga_horaria }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ $curso->valor }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ $curso->descricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">Atualizar Curso</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
