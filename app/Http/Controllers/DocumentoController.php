<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::paginate(10);
        return view('documentos.index', compact('documentos'));
    }

    public function create()
    {
        return view('documentos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:documentos',
            'descricao' => 'nullable|string|max:255',
            'obrigatorio' => 'required|boolean'
        ]);

        Documento::create($validated);

        return redirect()->route('documentos.index')
            ->with('success', 'Documento cadastrado com sucesso!');
    }

    public function show(Documento $documento)
    {
        return view('documentos.show', compact('documento'));
    }

    public function edit(Documento $documento)
    {
        return view('documentos.edit', compact('documento'));
    }

    public function update(Request $request, Documento $documento)
    {
        $validated = $request->validate([
            'nome' => [
                'required',
                'string',
                'max:100',
                Rule::unique('documentos')->ignore($documento->id)
            ],
            'descricao' => 'nullable|string|max:255',
            'obrigatorio' => 'required|boolean'
        ]);

        $documento->update($validated);

        return redirect()->route('documentos.show', $documento->id)
            ->with('success', 'Documento atualizado com sucesso!');
    }

    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect()->route('documentos.index')
            ->with('success', 'Documento removido com sucesso!');
    }
}