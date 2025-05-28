@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Comprovante</h1>

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" value="{{ $comprovante->descricao }}" required>
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Arquivo (deixe em branco para manter o atual)</label>
            <input type="file" name="arquivo" class="form-control">
        </div>

        <div class="mb-3">
            <label for="aluno_id" class="form-label">Aluno</label>
            <select name="aluno_id" class="form-control" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}" {{ $comprovante->aluno_id == $aluno->id ? 'selected' : '' }}>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('comprovantes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
