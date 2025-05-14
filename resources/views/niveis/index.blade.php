@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Níveis</h1>

    <a href="{{ route('niveis.create') }}" class="btn btn-primary mb-3">Novo Nível</a>

    @if(session('success'))
        <div class="alert alert-success mb-3">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($niveis as $nivel)
                <tr>
                    <td>{{ $nivel->id }}</td>
                    <td>{{ $nivel->nome }}</td>
                    <td>
                        <a href="{{ route('niveis.edit', $nivel->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('niveis.destroy', $nivel->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este nível?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $niveis->links() }} <!-- Paginação -->
    </div>
</div>
@endsection
