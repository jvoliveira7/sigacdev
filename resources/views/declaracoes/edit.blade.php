@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Declaração</h1>

    <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" id="aluno_id" class="form-control" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $aluno->id == $declaracao->aluno_id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Declaração</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $declaracao->tipo }}" required>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Atualizar Declaração</button>
        </div>

        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
