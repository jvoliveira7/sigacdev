@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Nível</h1>

    <form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Nível</label>
            <input type="text" name="nome" class="form-control" id="nome" value="{{ $nivel->nome }}" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('niveis.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection
