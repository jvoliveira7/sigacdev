@extends('layouts.app')

@section('content')
    <h1>Detalhes da Turma: {{ $turma->nome }}</h1>

    <p><strong>Curso:</strong> {{ $turma->curso->nome ?? 'Sem curso' }}</p>
    <p><strong>Código:</strong> {{ $turma->codigo }}</p>
    <p><strong>Data Início:</strong> {{ $turma->data_inicio->format('d/m/Y') }}</p>
    <p><strong>Data Fim:</strong> {{ $turma->data_fim->format('d/m/Y') }}</p>
    <p><strong>Horário:</strong> {{ $turma->horario }}</p>
    <p><strong>Sala:</strong> {{ $turma->sala }}</p>
    <p><strong>Professor:</strong> {{ $turma->professor->nome ?? 'Sem professor' }}</p>

    <h2>Alunos Matriculados</h2>
    <ul>
        @foreach($turma->alunos as $aluno)
            <li>{{ $aluno->nome }}</li>
        @endforeach
    </ul>

    <a href="{{ route('turmas.edit', $turma->id) }}">Editar Turma</a>
    <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir Turma</button>
    </form>
@endsection
