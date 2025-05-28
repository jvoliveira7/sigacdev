@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Curso</h1>

    <p><strong>Nome:</strong> {{ $curso->nome }}</p>

    <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
