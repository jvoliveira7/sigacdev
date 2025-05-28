@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Editar Turma</h1>

    <form action="{{ route('turmas.update', $turma) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Ano:</label>
            <input type="number" name="ano" value="{{ old('ano', $turma->ano) }}" class="w-full border px-4 py-2 rounded" required>
            @error('ano') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Curso:</label>
            <select name="curso_id" class="w-full border px-4 py-2 rounded" required>
                <option value="">Selecione o curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ old('curso_id', $turma->curso_id) == $curso->id ? 'selected' : '' }}>{{ $curso->nome }}</option>
                @endforeach
            </select>
            @error('curso_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded">Atualizar</button>
        <a href="{{ route('turmas.index') }}" class="ml-2 text-blue-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
