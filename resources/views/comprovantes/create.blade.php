@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Comprovante</h1>

    <form action="{{ route('comprovantes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo</label>
            <input type="file" name="arquivo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-control" required>
                <option value="">Selecione um aluno</option>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
