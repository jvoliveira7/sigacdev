<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index()
    {
        // Listar turmas com os cursos relacionados
        $turmas = Turma::with('curso')->paginate(10);
        return view('turmas.index', compact('turmas'));
    }

    public function create()
    {
        // Buscar cursos para o formulário de criação
        $cursos = Curso::orderBy('nome')->get();
        return view('turmas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        Turma::create($validated);

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    public function show(Turma $turma)
    {
        $turma->load('curso', 'alunos'); // Se quiser listar alunos da turma
        return view('turmas.show', compact('turma'));
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::orderBy('nome')->get();
        return view('turmas.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'ano' => 'required|integer|min:1900|max:' . (date('Y') + 1),
        ]);

        $turma->update($validated);

        return redirect()->route('turmas.show', $turma->id)->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        $turma->delete();

        return redirect()->route('turmas.index')->with('success', 'Turma removida com sucesso!');
    }
}
