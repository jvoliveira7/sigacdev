{{-- resources/views/alunos/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Lista de Alunos')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-6">
            <h2>Alunos Cadastrados</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('alunos.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Novo Aluno
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($alunos as $aluno)
                            <tr>
                                <td>{{ $aluno->id }}</td>
                                <td>{{ $aluno->nome }}</td>
                                <td class="cpf">{{ $aluno->cpf }}</td>
                                <td>{{ $aluno->email }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('alunos.show', $aluno->id) }}" 
                                           class="btn btn-info" title="Ver detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('alunos.edit', $aluno->id) }}" 
                                           class="btn btn-warning" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('alunos.destroy', $aluno->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" 
                                                    title="Excluir" onclick="return confirm('Tem certeza que deseja excluir?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum aluno cadastrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($alunos->hasPages())
                <div class="d-flex justify-content-center mt-4">
                    {{ $alunos->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
    $('.cpf').text(function(i, text) {
        return text.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    });
});
</script>
@endsection