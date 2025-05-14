{{-- resources/views/alunos/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Cadastrar Novo Aluno')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Cadastro de Aluno</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('alunos.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">
                                Nome Completo <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="nome" type="text" 
                                    class="form-control @error('nome') is-invalid @enderror" 
                                    name="nome" value="{{ old('nome') }}" 
                                    required autofocus>

                                @error('nome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">
                                E-mail <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" 
                                    required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">
                                CPF <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="cpf" type="text" 
                                    class="form-control cpf-mask @error('cpf') is-invalid @enderror" 
                                    name="cpf" value="{{ old('cpf') }}"
                                    maxlength="14" required>

                                @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefone" class="col-md-4 col-form-label text-md-end">
                                Telefone <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-6">
                                <input id="telefone" type="text" 
                                    class="form-control phone-mask @error('telefone') is-invalid @enderror" 
                                    name="telefone" value="{{ old('telefone') }}"
                                    required>

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Cadastrar
                                </button>

                                <a href="{{ route('alunos.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Voltar
                                </a>
                            </div>
                        </div>
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
    // Máscaras para os campos
    $('.cpf-mask').mask('000.000.000-00');
    $('.phone-mask').mask('(00) 00000-0000');
    
    // Validação do CPF
    $('#cpf').on('blur', function() {
        // Adicione aqui validação de CPF se necessário
    });
});
</script>
@endsection