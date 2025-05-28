<?php

namespace App\Http\Controllers;

use App\Models\Nivel;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    public function index()
    {
        $niveis = Nivel::with('cursos')->paginate(10);
        return view('niveis.index', compact('niveis'));
    }

    public function create()
    {
        return view('niveis.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:niveis,nome',
        ]);

        Nivel::create($validated);

        return redirect()->route('niveis.index')->with('success', 'Nível criado com sucesso!');
    }

    public function show(Nivel $nivel)
    {
        $nivel->load('cursos');
        return view('niveis.show', compact('nivel'));
    }

    public function edit(Nivel $nivel)
    {
        return view('niveis.edit', compact('nivel'));
    }

    public function update(Request $request, Nivel $nivel)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100|unique:niveis,nome,' . $nivel->id,
        ]);

        $nivel->update($validated);

        return redirect()->route('niveis.show', $nivel->id)->with('success', 'Nível atualizado com sucesso!');
    }

    public function destroy(Nivel $nivel)
    {
        $nivel->delete();
        return redirect()->route('niveis.index')->with('success', 'Nível removido com sucesso!');
    }
}
