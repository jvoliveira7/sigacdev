<?php

namespace App\Http\Controllers;

use App\Models\Declaracao;
use App\Models\Aluno;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DeclaracaoController extends Controller
{
    // Lista declarações com eager loading correto
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno.turma.curso'])->paginate(10);
        return view('declaracoes.index', compact('declaracoes'));
    }

    // Form para nova declaração
    public function create()
    {
        $alunos = Aluno::all(['id', 'nome']);
        $turmas = Turma::with('curso')->get();
        return view('declaracoes.create', compact('alunos', 'turmas'));
    }

    // Salvar nova declaração
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => [
                'required',
                'exists:turmas,id',
                function ($attribute, $value, $fail) use ($request) {
                    $aluno = Aluno::find($request->aluno_id);
                    if ($aluno && !$aluno->turma || $aluno->turma->id != $value) {
                        $fail('O aluno não está matriculado nesta turma.');
                    }
                }
            ],
            'tipo' => 'required|string|max:100',
        ]);

        $aluno = Aluno::findOrFail($validated['aluno_id']);
        $turma = Turma::with('curso')->findOrFail($validated['turma_id']);

        $conteudo = "Declaro para os devidos fins que o(a) aluno(a) {$aluno->nome} está regularmente matriculado(a) na turma de {$turma->curso->nome}.";

        $fileName = 'declaracao_' . Str::slug($aluno->nome) . '_' . time() . '.txt';

        Storage::disk('public')->put("declaracoes/{$fileName}", $conteudo);

        Declaracao::create([
            'aluno_id' => $aluno->id,
            'data' => Carbon::now()->format('Y-m-d'),
            'arquivo' => "declaracoes/{$fileName}",
            'tipo' => $validated['tipo'], // adicionei o campo tipo, pois você usa na validação
        ]);

        return redirect()->route('declaracoes.index')->with('success', 'Declaração emitida com sucesso!');
    }

    // Mostrar declaração
    public function show($id)
    {
        $declaracao = Declaracao::with(['aluno.turma.curso'])->findOrFail($id);
        return view('declaracoes.show', compact('declaracao'));
    }

    // Editar declaração
    public function edit($id)
    {
        $declaracao = Declaracao::findOrFail($id);
        $alunos = Aluno::all();
        return view('declaracoes.edit', compact('declaracao', 'alunos'));
    }

    // Atualizar declaração
    public function update(Request $request, $id)
    {
        $declaracao = Declaracao::findOrFail($id);

        $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'tipo' => 'required|string|max:255',
        ]);

        $declaracao->aluno_id = $request->aluno_id;
        $declaracao->tipo = $request->tipo;

        $declaracao->save();

        return redirect()->route('declaracoes.index')->with('success', 'Declaração atualizada com sucesso.');
    }

    // Excluir declaração
    public function destroy($id)
    {
        $declaracao = Declaracao::findOrFail($id);

        if ($declaracao->arquivo) {
            Storage::disk('public')->delete($declaracao->arquivo);
        }

        $declaracao->delete();

        return redirect()->route('declaracoes.index')->with('success', 'Declaração excluída com sucesso!');
    }

    // Download do arquivo da declaração
    public function download($id)
    {
        $declaracao = Declaracao::findOrFail($id);

        if (!$declaracao->arquivo || !Storage::disk('public')->exists($declaracao->arquivo)) {
            return redirect()->route('declaracoes.index')->with('error', 'Arquivo não encontrado.');
        }

        return Storage::disk('public')->download($declaracao->arquivo);
    }
}
