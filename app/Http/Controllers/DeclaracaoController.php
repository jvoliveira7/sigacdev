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
    // Exibe a lista de declarações
    public function index()
    {
        $declaracoes = Declaracao::with(['aluno', 'turma.curso'])->paginate(10);
        return view('declaracoes.index', compact('declaracoes'));
    }

    // Exibe o formulário para criar uma nova declaração
    public function create()
    {
        $alunos = Aluno::all(['id', 'nome']);
        $turmas = Turma::with('curso')->get();
        return view('declaracoes.create', compact('alunos', 'turmas'));
    }

    // Armazena a nova declaração
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'turma_id' => 'required|exists:turmas,id',
            'tipo' => 'required|string|max:100',
        ]);

        $aluno = Aluno::findOrFail($validated['aluno_id']);
        $turma = Turma::with('curso')->findOrFail($validated['turma_id']);

        // Gera o conteúdo da declaração
        $conteudo = "Declaro para os devidos fins que o(a) aluno(a) {$aluno->nome} está regularmente matriculado(a) na turma de {$turma->curso->nome}.";

        // Define o nome do arquivo para salvar
        $fileName = 'declaracao_' . Str::slug($aluno->nome) . '_' . time() . '.txt';

        // Salva o conteúdo da declaração no disco
        Storage::disk('public')->put("declaracoes/{$fileName}", $conteudo);

        // Cria a declaração no banco com o caminho do arquivo
        Declaracao::create([
            'aluno_id' => $aluno->id,
            'turma_id' => $turma->id,
            'data_emissao' => Carbon::now()->format('Y-m-d'),
            'arquivo' => "declaracoes/{$fileName}", // Caminho do arquivo gerado
        ]);

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração emitida com sucesso!');
    }

    // Exibe os detalhes de uma declaração
    public function show(Declaracao $declaracao)
    {
        return view('declaracoes.show', compact('declaracao'));
    }

    // Faz o download da declaração como um arquivo .txt
    public function download(Declaracao $declaracao)
    {
        $filePath = storage_path('app/public/' . $declaracao->arquivo);
        $fileName = 'declaracao_' . $declaracao->id . '.txt';

        return response()->download($filePath, $fileName, [
            'Content-Type' => 'text/plain',
        ]);
    }

    // Exclui uma declaração
    public function destroy(Declaracao $declaracao)
    {
        // Remove o arquivo associado à declaração
        Storage::disk('public')->delete($declaracao->arquivo);

        // Deleta o registro da declaração no banco de dados
        $declaracao->delete();

        return redirect()->route('declaracoes.index')
            ->with('success', 'Declaração removida com sucesso!');
    }
}
