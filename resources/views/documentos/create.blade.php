@extends('layouts.app')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Criar Documento</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold">URL</label>
            <input type="url" name="url" class="w-full border rounded p-2" value="{{ old('url') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Descrição</label>
            <input type="text" name="descricao" class="w-full border rounded p-2" value="{{ old('descricao') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Horas Internas</label>
            <input type="number" name="horas_in" class="w-full border rounded p-2" step="0.1" value="{{ old('horas_in') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Horas Validadas</label>
            <input type="number" name="horas_out" class="w-full border rounded p-2" step="0.1" value="{{ old('horas_out') }}">
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Status</label>
            <input type="text" name="status" class="w-full border rounded p-2" value="{{ old('status') }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Comentário</label>
            <textarea name="comentario" class="w-full border rounded p-2">{{ old('comentario') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold">Categoria</label>
            <select name="categoria_id" class="w-full border rounded p-2" required>
                <option value="">Selecione...</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Salvar Documento
        </button>
        <a href="{{ route('documentos.index') }}" class="ml-4 text-blue-600 hover:underline">Cancelar</a>
    </form>
</div>
@endsection
