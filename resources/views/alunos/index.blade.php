@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Alunos</h1>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr>
                <th class="border p-2">Nome</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">CPF</th>
                <th class="border p-2">Telefone</th>
                <th class="border p-2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alunos as $aluno)
                <tr>
                    <td class="border p-2">{{ $aluno->nome }}</td>
                    <td class="border p-2">{{ $aluno->email }}</td>
                    <td class="border p-2">{{ $aluno->cpf }}</td>
                    <td class="border p-2">{{ $aluno->telefone }}</td>
                    <td class="border p-2 space-x-2">
                        <a href="{{ route('alunos.show', $aluno->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        <a href="{{ route('alunos.edit', $aluno->id) }}" class="text-yellow-600 hover:underline">Editar</a>
                        <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Confirmar exclusão?')" class="text-red-600 hover:underline">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center p-4">Nenhum aluno encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $alunos->links() }}  <!-- Paginação -->
    </div>
</div>
@endsection
