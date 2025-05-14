@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Curso</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sigla</th>
                <th>Carga Horária</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->sigla }}</td>
                    <td>{{ $curso->carga_horaria }} horas</td>
                    <td>R$ {{ number_format($curso->valor, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cursos->links() }}
</div>
@endsection
