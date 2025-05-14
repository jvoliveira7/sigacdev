<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    // Lista todas as turmas
    public function index()
    {
        $turmas = Turma::paginate(10);
        return view('turmas.index', compact('turmas'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        $cursos = Curso::all();
        return view('turmas.create', compact('cursos'));
    }

    // Insere uma nova turma
    public function store(Request $request)
    {
        $validated = $request->validate([
            'curso_id'     => 'required|exists:cursos,id',
            'codigo'       => 'required|string|max:50|unique:turmas,codigo',
            'nome'         => 'required|string|max:100',
            'data_inicio'  => 'required|date',
            'data_fim'     => 'required|date|after_or_equal:data_inicio',
            'horario'      => 'required|string|max:50',
            'vagas'        => 'required|integer|min:1',
            'local'        => 'required|string|max:100',
        ]);

        Turma::create($validated);

        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    // Exibe detalhes de uma turma
    public function show(Turma $turma)
    {
        $turma->load('curso');
        return view('turmas.show', compact('turma'));
    }

    // Exibe formulário de edição
    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        return view('turmas.edit', compact('turma', 'cursos'));
    }

    // Atualiza turma existente
    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'curso_id'     => 'required|exists:cursos,id',
            'codigo'       => 'required|string|max:50|unique:turmas,codigo,' . $turma->id,
            'nome'         => 'required|string|max:100',
            'data_inicio'  => 'required|date',
            'data_fim'     => 'required|date|after_or_equal:data_inicio',
            'horario'      => 'required|string|max:50',
            'vagas'        => 'required|integer|min:1',
            'local'        => 'required|string|max:100',
        ]);

        $turma->update($validated);

        return redirect()->route('turmas.show', $turma->id)->with('success', 'Turma atualizada com sucesso!');
    }

    // Exclui uma turma
    public function destroy(Turma $turma)
    {
        $turma->delete();
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }

    // Gera relatório CSV
    public function relatorio()
    {
        $turmas = Turma::with('curso')->get();

        $filename = "relatorio_turmas.csv";
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['ID', 'Nome da Turma', 'Curso', 'Data de Criação']);

        foreach ($turmas as $turma) {
            fputcsv($handle, [
                $turma->id,
                $turma->nome,
                $turma->curso->nome ?? 'Sem curso',
                $turma->created_at->format('d/m/Y')
            ]);
        }

        fclose($handle);
        exit;
    }
}
