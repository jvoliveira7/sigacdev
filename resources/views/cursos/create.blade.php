@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Novo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="sigla" class="form-label">Sigla</label>
            <input type="text" name="sigla" id="sigla" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select name="categoria_id" id="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="nivel_id" class="form-label">Nível</label>
            <select name="nivel_id" id="nivel_id" class="form-control" required>
                @foreach($niveis as $nivel)
                    <option value="{{ $nivel->id }}">{{ $nivel->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="carga_horaria" class="form-label">Carga Horária</label>
            <input type="number" name="carga_horaria" id="carga_horaria" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Curso</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
