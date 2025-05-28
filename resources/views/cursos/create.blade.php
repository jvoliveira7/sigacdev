@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Curso</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
