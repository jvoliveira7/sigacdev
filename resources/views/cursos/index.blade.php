@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Novo Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->nome }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $cursos->links() }}
</div>
@endsection
