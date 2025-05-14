<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Exibe a lista de cursos
    public function index()
    {
        $cursos = Curso::with(['categoria', 'nivel'])->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    // Exibe o formulário de criação de curso
    public function create()
    {
        $categorias = Categoria::all();
        $niveis = Nivel::all();
        return view('cursos.create', compact('categorias', 'niveis'));
    }

    public function show(Curso $curso)
{
    return view('cursos.show', compact('curso'));
}


    // Armazena um novo curso
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'nivel_id' => 'required|exists:niveis,id',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso cadastrado com sucesso!');
    }

    // Exibe o formulário de edição de curso
    public function edit(Curso $curso)
    {
        $categorias = Categoria::all();
        $niveis = Nivel::all();
        return view('cursos.edit', compact('curso', 'categorias', 'niveis'));
    }

    // Atualiza um curso existente
    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
            'nivel_id' => 'required|exists:niveis,id',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    // Remove um curso
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso excluído com sucesso!');
    }
}
