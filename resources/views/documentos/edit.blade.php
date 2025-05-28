@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Editar Documento</h1>

    <form action="{{ route('documentos.update', $documento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-medium">Nome</label>
            <input type="text" name="nome" class="w-full border rounded p-2" value="{{ $documento->nome }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Tipo</label>
            <input type="text" name="tipo" class="w-full border rounded p-2" value="{{ $documento->tipo }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium">Aluno</label>
            <select name="aluno_id" class="w-full border rounded p-2" required>
                <option value="">Selecione</option>
                @foreach ($alunos as $aluno)
                    <option value="{{ $aluno->id }}" @if ($aluno->id == $documento->aluno_id) selected @endif>
                        {{ $aluno->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
        <a href="{{ route('documentos.index') }}" class="ml-4 text-gray-700 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
