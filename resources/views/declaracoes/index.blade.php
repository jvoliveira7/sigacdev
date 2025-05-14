@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Declarações</h1>

    <a href="{{ route('declaracoes.create') }}" class="btn btn-success mb-3">Emitir Nova Declaração</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aluno</th>
                <th>Tipo</th>
                <th>Emitida em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($declaracoes as $declaracao)
                <tr>
                    <td>{{ $declaracao->id }}</td>
                    <td>{{ $declaracao->aluno->nome }}</td>
                    <td>{{ $declaracao->tipo }}</td>
                    <td>{{ $declaracao->created_at->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('declaracoes.download', $declaracao->id) }}" class="btn btn-sm btn-info">Download</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
