<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Novo Aluno</h2>
    </x-slot>

    <form action="{{ route('alunos.store') }}" method="POST" class="mt-4 space-y-4 max-w-xl mx-auto">
        @csrf

        <div>
            <label class="block font-medium">Nome:</label>
            <input type="text" name="nome" class="w-full border rounded p-2" value="{{ old('nome') }}" required>
        </div>

        <div>
            <label class="block font-medium">Email:</label>
            <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email') }}" required>
        </div>

        <div>
            <label class="block font-medium">CPF:</label>
            <input type="text" name="cpf" class="w-full border rounded p-2" value="{{ old('cpf') }}" required>
        </div>

        <div>
            <label class="block font-medium">Telefone:</label>
            <input type="text" name="telefone" class="w-full border rounded p-2" value="{{ old('telefone') }}" required>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Salvar</button>
    </form>
</x-app-layout>
