@extends('layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Lista de Documentos</h1>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($documentos->count())
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2">Descrição</th>
                    <th class="border p-2">Categoria</th>
                    <th class="border p-2">Usuário</th>
                    <th class="border p-2">Horas</th>
                    <th class="border p-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documentos as $documento)
                    <tr>
                        <td class="border p-2">{{ $documento->descricao }}</td>
                        <td class="border p-2">{{ $documento->categoria->nome ?? '—' }}</td>
                        <td class="border p-2">{{ $documento->user->name ?? '—' }}</td>
                        <td class="border p-2">{{ $documento->horas_in }}h</td>
                        <td class="border p-2">
                            <a href="{{ route('documentos.show', $documento->id) }}" class="text-blue-600 hover:underline">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $documentos->links() }}
        </div>
    @else
        <p>Nenhum documento encontrado.</p>
    @endif
</div>
@endsection
