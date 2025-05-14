<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::paginate(10);
        return view('niveis.index', compact('niveis'));
    }

    public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:50|unique:niveis',
            'descricao' => 'nullable|string|max:255'
        ]);

        Nivel::create($validated);

        return redirect()->route('niveis.index')
            ->with('success', 'Nível cadastrado com sucesso!');
    }

    public function show(Nivel $nivel)
    {
        return view('niveis.show', compact('nivel'));
    }

    public function edit(Nivel $nivel)
    {
        return view('niveis.edit', compact('nivel'));
    }

    public function update(Request $request, Nivel $nivel)
    {
        $validated = $request->validate([
            'nome' => [
                'required',
                'string',
                'max:50',
                Rule::unique('niveis')->ignore($nivel->id)
            ],
            'descricao' => 'nullable|string|max:255'
        ]);

        $nivel->update($validated);

        return redirect()->route('niveis.show', $nivel->id)
            ->with('success', 'Nível atualizado com sucesso!');
    }

    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return redirect()->route('niveis.index')
            ->with('success', 'Nível removido com sucesso!');
    }
}