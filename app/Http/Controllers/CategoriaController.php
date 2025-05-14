<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Exibe a lista de categorias
    public function index()
    {
        $categorias = Categoria::paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    // Exibe o formulário para criar uma nova categoria
    public function create()
    {
        return view('categorias.create');
    }

    // Armazena a nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Atualiza a categoria
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255'
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Exibe os detalhes de uma categoria
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // Exclui a categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
