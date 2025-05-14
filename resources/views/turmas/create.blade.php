@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Turma</h1>

    <form action="{{ route('turmas.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="curso_id">Curso</label>
            <select name="curso_id" id="curso_id" class="form-control">
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nome">Nome da Turma</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}">
        </div>

        <button type="submit" class="btn btn-primary">Criar Turma</button>
    </form>
</div>
@endsection
