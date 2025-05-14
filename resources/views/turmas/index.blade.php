@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Turmas</h1>
        <a href="{{ route('turmas.create') }}" class="btn btn-success">Criar Nova Turma</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Data Início</th>
                    <th>Data Fim</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr>
                        <td>{{ $turma->nome }}</td>
                        <td>{{ $turma->curso->nome ?? 'Sem curso' }}</td>
                        <td>{{ optional($turma->data_inicio)->format('d/m/Y') }}</td>
                        <td>{{ optional($turma->data_fim)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('turmas.show', $turma->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('turmas.edit', $turma->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Tem certeza que deseja excluir esta turma?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Paginação, se estiver usando paginate() no controller --}}
    <div class="mt-4">
        {{ $turmas->links() }}
    </div>
</div>
@endsection
