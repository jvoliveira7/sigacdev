@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Comprovantes</h1>
    <a href="{{ route('comprovantes.create') }}" class="btn btn-primary mb-3">Novo Comprovante</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Aluno</th>
                <th>Arquivo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comprovantes as $comprovante)
                <tr>
                    <td>{{ $comprovante->descricao }}</td>
                    <td>{{ $comprovante->aluno->nome ?? 'N/A' }}</td>
                    <td><a href="{{ asset('storage/' . $comprovante->arquivo) }}" target="_blank">Visualizar</a></td>
                    <td>
                        <a href="{{ route('comprovantes.show', $comprovante->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('comprovantes.edit', $comprovante->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('comprovantes.destroy', $comprovante->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $comprovantes->links() }}
</div>
@endsection
