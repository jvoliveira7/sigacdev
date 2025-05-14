@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Documento #{{ $documento->id }}</h1>

    <p><strong>Nome:</strong> {{ $documento->nome }}</p>
    <p><strong>Obrigatório:</strong> {{ $documento->obrigatorio ? 'Sim' : 'Não' }}</p>

    <a href="{{ route('documentos.edit', $documento->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('documentos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
