<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Detalhes do Aluno</h2>
    </x-slot>

    <div class="mt-4 max-w-xl mx-auto space-y-2">
        <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
        <p><strong>Email:</strong> {{ $aluno->email }}</p>
        <p><strong>CPF:</strong> {{ $aluno->cpf }}</p>
        <p><strong>Telefone:</strong> {{ $aluno->telefone }}</p>
    </div>

    <a href="{{ route('alunos.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Voltar</a>
</x-app-layout>
