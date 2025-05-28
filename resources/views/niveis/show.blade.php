@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Nível</h1>

    <div class="mb-4">
        <strong>Nome:</strong> {{ $nivel->nome }}
    </div>

    <a href="{{ route('niveis.edit', $nivel->id) }}" class="text-yellow-600 hover:underline">Editar</a>
    <a href="{{ route('niveis.index') }}" class="ml-4 text-blue-600 hover:underline">Voltar</a>
</div>
@endsection
