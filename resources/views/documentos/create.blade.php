@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Documento</h1>

    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="obrigatorio" value="1" class="form-check-input" id="obrigatorio">
            <label class="form-check-label" for="obrigatorio">Obrigatório</label>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
