<?php

namespace App\Http\Controllers;

use App\Models\Comprovante;
use App\Models\Categoria;
use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ComprovanteController extends Controller
{
    public function index()
    {
        $comprovantes = Comprovante::with(['categoria', 'aluno', 'user'])->paginate(10);
        return view('comprovantes.index', compact('comprovantes'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.create', compact('categorias', 'alunos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'horas' => 'required|numeric|min:0',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
            // user_id será do usuário logado
        ]);

        $validated['user_id'] = auth()->id();

        Comprovante::create($validated);

        return redirect()->route('comprovantes.index')->with('success', 'Comprovante criado com sucesso!');
    }

    public function show(Comprovante $comprovante)
    {
        $comprovante->load(['categoria', 'aluno', 'user', 'declaracoes']);
        return view('comprovantes.show', compact('comprovante'));
    }

    public function edit(Comprovante $comprovante)
    {
        $categorias = Categoria::all();
        $alunos = Aluno::all();
        return view('comprovantes.edit', compact('comprovante', 'categorias', 'alunos'));
    }

    public function update(Request $request, Comprovante $comprovante)
    {
        $validated = $request->validate([
            'horas' => 'required|numeric|min:0',
            'atividade' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'aluno_id' => 'required|exists:alunos,id',
        ]);

        $comprovante->update($validated);

        return redirect()->route('comprovantes.show', $comprovante->id)->with('success', 'Comprovante atualizado com sucesso!');
    }

    public function destroy(Comprovante $comprovante)
    {
        $comprovante->delete();
        return redirect()->route('comprovantes.index')->with('success', 'Comprovante removido com sucesso!');
    }

    // Método adicional para mostrar documento relacionado (se necessário)
    public function showDocument(Comprovante $comprovante)
    {
        // Exemplo de retorno para o documento, adapte conforme sua lógica
        return view('comprovantes.documento', compact('comprovante'));
    }
}
