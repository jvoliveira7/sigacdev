@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Declaração</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('declaracoes.update', $declaracao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $declaracao->descricao) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="{{ route('declaracoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
