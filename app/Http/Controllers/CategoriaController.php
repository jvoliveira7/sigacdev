<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    // Listar categorias com curso relacionado
    public function index()
    {
        $categorias = Categoria::with('curso')->paginate(10);
        return view('categorias.index', compact('categorias'));
    }

    // Exibir formulário para criar nova categoria
    public function create()
    {
        $cursos = Curso::all();
        return view('categorias.create', compact('cursos'));
    }

    // Salvar nova categoria
    public function store(Request $request)
    {
        $validated = $this->validateRequest();

        Categoria::create($validated);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Mostrar detalhes da categoria com curso, comprovantes e documentos
    public function show(Categoria $categoria)
    {
        $categoria->load(['curso', 'comprovantes', 'documentos']);
        return view('categorias.show', compact('categoria'));
    }

    // Formulário para editar categoria
    public function edit(Categoria $categoria)
    {
        $cursos = Curso::all();
        return view('categorias.edit', compact('categoria', 'cursos'));
    }

    // Atualizar categoria
    public function update(Request $request, Categoria $categoria)
    {
        $validated = $this->validateRequest($categoria);

        $categoria->update($validated);

        return redirect()->route('categorias.show', $categoria->id)->with('success', 'Categoria atualizada com sucesso!');
    }

    // Deletar categoria
    public function destroy(Categoria $categoria)
    {
        try {
            $categoria->delete();
            return redirect()->route('categorias.index')->with('success', 'Categoria removida com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('categorias.index')->with('error', 'Erro ao remover categoria: ' . $e->getMessage());
        }
    }

    // Validação comum para store e update
    private function validateRequest(Categoria $categoria = null)
    {
        return request()->validate([
            'nome' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias')->ignore($categoria?->id),
            ],
            'maximo_horas' => 'required|integer|min:0',
            'curso_id' => 'nullable|exists:cursos,id',
        ]);
    }
}
