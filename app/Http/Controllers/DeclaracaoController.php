<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;

class DeclaracaoController extends Controller
{
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno', 'turma.curso'])->paginate(10);
        return view('declaracoes.index', compact('declaracoes'));
    }

    public function create()
    {
        $alunos = Aluno::all(['id', 'nome']);
        $turmas = Turma::with('curso')->get();
        return view('declaracoes.create', compact('alunos', 'turmas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id',
            'tipo' => 'required|string|max:100',
            'conteudo' => 'required|string',
        ]);

        $declaracao = Declaracao::create($validated);

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração emitida com sucesso!');
    }

    public function show(Declaracao $declaracao)
    {
        return view('declaracoes.show', compact('declaracao'));
    }

    public function download(Declaracao $declaracao)
    {
        $fileName = 'declaracao_' . $declaracao->id . '.txt';

        return response($declaracao->conteudo)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', "attachment; filename={$fileName}");
    }

    public function destroy(Declaracao $declaracao)
    {
        $declaracao->delete();

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração removida com sucesso!');
    }
}
