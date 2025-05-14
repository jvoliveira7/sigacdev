@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Comprovantes</h1>

    <a href="{{ route('alunos.index') }}" class="btn btn-secondary mb-3">Voltar aos Alunos</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Tipo</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->id }}</td>
                    <td>{{ $comprovante->aluno->nome }}</td>
                    <td>{{ $comprovante->tipo }}</td>
                    <td>{{ $comprovante->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
