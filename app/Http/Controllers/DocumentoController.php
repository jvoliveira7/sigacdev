<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Aluno;

class DocumentoController extends Controller
{
    public function index()
    {
            $documentos = Documento::with('categoria', 'user')->paginate(10);
    return view('documentos.index', compact('documentos'));
    }

  

public function create()
{
    $categorias = Categoria::all();

    return view('documentos.create', compact('categorias' ));
}


    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required|url|max:255',
            'descricao' => 'required|string|max:255',
            'horas_in' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'comentario' => 'nullable|string|max:500',
            'horas_out' => 'nullable|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        // Adiciona user_id logado
        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        Documento::create($validated);

        return redirect()->route('documentos.index')->with('success', 'Documento criado com sucesso!');
    }

    public function show(Documento $documento)
    {
        $documento->load('categoria', 'user');
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $categorias = Categoria::all();
        return view('documentos.edit', compact('documento', 'categorias'));
    }

    public function update(Request $request, Documento $documento)
    {
        $validated = $request->validate([
            'url' => 'required|url|max:255',
            'descricao' => 'required|string|max:255',
            'horas_in' => 'required|numeric|min:0',
            'status' => 'required|string|max:50',
            'comentario' => 'nullable|string|max:500',
            'horas_out' => 'nullable|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $documento->update($validated);

        return redirect()->route('documentos.show', $documento->id)->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.index')->with('success', 'Documento removido com sucesso!');
    }
}
