@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Lista de Níveis</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('niveis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Novo Nível</a>

    <table class="mt-6 w-full border-collapse border">
        <thead class="bg-gray-200">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nome</th>
                <th class="border px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($niveis as $nivel)
                <tr>
                    <td class="border px-4 py-2">{{ $nivel->id }}</td>
                    <td class="border px-4 py-2">{{ $nivel->nome }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('niveis.show', $nivel->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('niveis.edit', $nivel->id) }}" class="ml-2 text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
