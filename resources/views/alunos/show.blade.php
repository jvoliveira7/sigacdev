{{-- resources/views/alunos/show.blade.php --}}
@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detalhes do Aluno</h5>
                    <div class="btn-group">
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('alunos.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">ID:</div>
                        <div class="col-md-8">{{ $aluno->id }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">Nome:</div>
                        <div class="col-md-8">{{ $aluno->nome }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">CPF:</div>
                        <div class="col-md-8 cpf">{{ $aluno->cpf }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">E-mail:</div>
                        <div class="col-md-8">{{ $aluno->email }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">Telefone:</div>
                        <div class="col-md-8 phone">{{ $aluno->telefone }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">Cadastrado em:</div>
                        <div class="col-md-8">{{ $aluno->created_at->format('d/m/Y H:i') }}</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-4 fw-bold">Última atualização:</div>
                        <div class="col-md-8">{{ $aluno->updated_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
                            <i class="fas fa-trash-alt"></i> Excluir Aluno
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
    // Formata CPF
    $('.cpf').text(function(i, text) {
        return text.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    });
    
    // Formata telefone
    $('.phone').text(function(i, text) {
        return text.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    });
});
</script>
@endsection