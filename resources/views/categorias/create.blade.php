<!-- resources/views/categorias/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Categoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-size: 16px;
            color: #555;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #45a049;
        }
        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        a {
            text-decoration: none;
            color: #4CAF50;
            display: inline-block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Criar Nova Categoria</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf

            <div>
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome') }}" required>
                @error('nome')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Salvar</button>
        </form>

        <a href="{{ route('categorias.index') }}">Voltar</a>
    </div>

</body>
</html>
