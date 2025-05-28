<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Nivel;
use App\Models\Eixo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['nivel', 'eixo'])->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('cursos.create', compact('niveis', 'eixos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:10|unique:cursos,sigla',
            'total_horas' => 'required|integer|min:0',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id',
        ]);

        Curso::create($validated);

        return redirect()->route('cursos.index')->with('success', 'Curso criado com sucesso!');
    }

    public function show(Curso $curso)
    {
        $curso->load(['nivel', 'eixo', 'turmas', 'alunos', 'categorias']);
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        $niveis = Nivel::all();
        $eixos = Eixo::all();
        return view('cursos.edit', compact('curso', 'niveis', 'eixos'));
    }

    public function update(Request $request, Curso $curso)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => [
                'required',
                'string',
                'max:10',
                Rule::unique('cursos')->ignore($curso->id),
            ],
            'total_horas' => 'required|integer|min:0',
            'nivel_id' => 'required|exists:niveis,id',
            'eixo_id' => 'required|exists:eixos,id',
        ]);

        $curso->update($validated);

        return redirect()->route('cursos.show', $curso->id)->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso removido com sucesso!');
    }
}
