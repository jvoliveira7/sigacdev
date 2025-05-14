@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Documentos</h1>

    <a href="{{ route('documentos.create') }}" class="btn btn-success mb-3">Novo Documento</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Obrigatório</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documentos as $documento)
                <tr>
                    <td>{{ $documento->id }}</td>
                    <td>{{ $documento->nome }}</td>
                    <td>{{ $documento->obrigatorio ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('documentos.show', $documento->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('documentos.destroy', $documento->id) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmar exclusão?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
