<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Editar Aluno</h2>
    </x-slot>

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" class="mt-4 space-y-4 max-w-xl mx-auto">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nome:</label>
            <input type="text" name="nome" class="w-full border rounded p-2" value="{{ old('nome', $aluno->nome) }}" required>
        </div>

        <div>
            <label class="block font-medium">Email:</label>
            <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email', $aluno->email) }}" required>
        </div>

        <div>
            <label class="block font-medium">CPF:</label>
            <input type="text" name="cpf" class="w-full border rounded p-2" value="{{ old('cpf', $aluno->cpf) }}" required>
        </div>

        <div>
            <label class="block font-medium">Telefone:</label>
            <input type="text" name="telefone" class="w-full border rounded p-2" value="{{ old('telefone', $aluno->telefone) }}" required>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Atualizar</button>
    </form>
</x-app-layout>
