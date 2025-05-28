@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Nível</h1>

    <form action="{{ route('niveis.update', $nivel->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block font-bold">Nome do Nível</label>
            <input type="text" name="nome" id="nome" value="{{ $nivel->nome }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Atualizar</button>
        <a href="{{ route('niveis.index') }}" class="ml-4 text-blue-600 hover:underline">Voltar</a>
    </form>
</div>
@endsection
