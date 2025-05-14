<!-- resources/views/categorias/show.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria: {{ $categoria->nome }}</title>
    <style>
        /* CSS compartilhado para manter consistência */
        /* ... (adote o CSS da página de criação) ... */
    </style>
</head>
<body>

    <div class="container">
        <h1>Detalhes da Categoria</h1>

        <p><strong>ID:</strong> {{ $categoria->id }}</p>
        <p><strong>Nome:</strong> {{ $categoria->nome }}</p>

        <a href="{{ route('categorias.index') }}">Voltar</a>
    </div>

</body>
</html>
