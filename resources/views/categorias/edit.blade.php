<!-- resources/views/categorias/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <style>
        /* CSS compartilhado para manter consistência */
        /* ... (adote o CSS da página de criação) ... */
    </style>
</head>
<body>

    <div class="container">
        <h1>Editar Categoria: {{ $categoria->nome }}</h1>

        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
                @error('nome')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Atualizar</button>
        </form>

        <a href="{{ route('categorias.index') }}">Voltar</a>
    </div>

</body>
</html>
