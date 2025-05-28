@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Turmas</h1>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <a href="{{ route('turmas.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Nova Turma</a>

    @if($turmas->count())
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2 text-left">ID</th>
                    <th class="border px-4 py-2 text-left">Ano</th>
                    <th class="border px-4 py-2 text-left">Curso</th>
                    <th class="border px-4 py-2 text-left">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($turmas as $turma)
                    <tr>
                        <td class="border px-4 py-2">{{ $turma->id }}</td>
                        <td class="border px-4 py-2">{{ $turma->ano }}</td>
                        <td class="border px-4 py-2">{{ $turma->curso->nome ?? '—' }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('turmas.show', $turma) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('turmas.edit', $turma) }}" class="text-yellow-600 hover:underline ml-2">Editar</a>
                            <form action="{{ route('turmas.destroy', $turma) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $turmas->links() }}
        </div>
    @else
        <p>Nenhuma turma cadastrada.</p>
    @endif
</div>
@endsection
