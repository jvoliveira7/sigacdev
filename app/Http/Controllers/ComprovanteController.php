<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Aluno;
use App\Models\Documento;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    // Lista todos os comprovantes
    public function index()
    {
        $comprovantes = Comprovante::with(['aluno', 'documento'])->paginate(10);
        return view('comprovantes.index', compact('comprovantes'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        $alunos = Aluno::all(['id', 'nome']);
        $documentos = Documento::all();
        return view('comprovantes.create', compact('alunos', 'documentos'));
    }

    // Armazena novo comprovante
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id',
            'data_emissao' => 'required|date',
            'arquivo' => 'required|string|max:255',
        ]);

        Comprovante::create($validated);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante cadastrado com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit(Comprovante $comprovante)
    {
        $alunos = Aluno::all(['id', 'nome']);
        $documentos = Documento::all();
        return view('comprovantes.edit', compact('comprovante', 'alunos', 'documentos'));
    }

    // Atualiza um comprovante existente
    public function update(Request $request, Comprovante $comprovante)
    {
        $validated = $request->validate([
            'aluno_id' => 'required|exists:alunos,id',
            'documento_id' => 'required|exists:documentos,id',
            'data_emissao' => 'required|date',
            'arquivo' => 'required|string|max:255',
        ]);

        $comprovante->update($validated);

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante atualizado com sucesso!');
    }

    // Remove um comprovante
    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();

        return redirect()->route('comprovantes.index')
            ->with('success', 'Comprovante excluído com sucesso!');
    }

    // Exibe os detalhes de um comprovante específico
    public function show($id)
    {
        // Encontrar o comprovante com o id fornecido, incluindo as relações
        $comprovante = Comprovante::with(['aluno', 'documento'])->findOrFail($id);

        // Retornar a view de detalhes do comprovante
        return view('comprovantes.show', compact('comprovante'));
    }
}
