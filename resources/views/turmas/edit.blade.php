@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Turma</h1>

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="curso_id">Curso</label>
            <select name="curso_id" id="curso_id" class="form-control">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}" @if ($curso->id == $turma->curso_id) selected @endif>
                        {{ $curso->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nome">Nome da Turma</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $turma->nome) }}">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Turma</button>
    </form>
</div>
@endsection
