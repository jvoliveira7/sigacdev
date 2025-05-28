@extends('layouts.app')

@section('content')
<div class="p-6 max-w-lg mx-auto">
    <h1 class="text-2xl font-bold mb-4">Criar Nível</h1>

    <form action="{{ route('niveis.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nome" class="block font-bold">Nome do Nível</label>
            <input type="text" name="nome" id="nome" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Salvar</button>
        <a href="{{ route('niveis.index') }}" class="ml-4 text-blue-600 hover:underline">Voltar</a>
    </form>
</div>
@endsection
