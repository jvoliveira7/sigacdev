@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Declarações</h1>
        <a href="{{ route('declaracoes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Nova Declaração
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    @endif

    @if($declaracoes->count() > 0)
        <div class="row g-4">
            @foreach($declaracoes as $declaracao)
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">
                                <strong>Aluno:</strong> {{ $declaracao->aluno->nome ?? 'N/A' }}
                            </h5>
                            <p class="card-text mb-1"><strong>Turma:</strong> {{ $declaracao->aluno->turma->nome ?? 'N/A' }}</p>
                            <p class="card-text mb-1"><strong>Curso:</strong> {{ $declaracao->aluno->turma->curso->nome ?? 'N/A' }}</p>
                            <p class="card-text mb-3"><strong>Data:</strong> {{ $declaracao->data ? $declaracao->data->format('d/m/Y') : '-' }}</p>
                            <p class="card-text"><strong>Tipo:</strong> {{ $declaracao->tipo ?? '-' }}</p>

                            <div class="mt-auto d-flex justify-content-between">
                                <a href="{{ route('declaracoes.show', $declaracao->id) }}" class="btn btn-sm btn-outline-primary" title="Ver">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('declaracoes.edit', $declaracao->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('declaracoes.destroy', $declaracao->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta declaração?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $declaracoes->links() }}
        </div>
    @else
        <div class="alert alert-info">
            Nenhuma declaração encontrada.
        </div>
    @endif
</div>
@endsection
