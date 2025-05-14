@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Comprovante</h1>

    <form action="{{ route('comprovantes.update', $comprovante->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" class="form-control" value="{{ $comprovante->tipo }}" required>
        </div>

        <div class="mb-3">
            <label for="arquivo" class="form-label">Substituir Arquivo</label>
            <input type="file" name="arquivo" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
