@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Emitir Declaração</h1>

    <form action="{{ route('declaracoes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-select" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Declaração</label>
            <input type="text" name="tipo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="conteudo" class="form-label">Conteúdo</label>
            <textarea name="conteudo" class="form-control" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Emitir</button>
    </form>
</div>
@endsection
