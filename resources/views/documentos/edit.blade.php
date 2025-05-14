@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Documento</h1>

    <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $documento->nome }}" required>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="obrigatorio" value="1" class="form-check-input" id="obrigatorio"
                {{ $documento->obrigatorio ? 'checked' : '' }}>
            <label class="form-check-label" for="obrigatorio">Obrigatório</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
