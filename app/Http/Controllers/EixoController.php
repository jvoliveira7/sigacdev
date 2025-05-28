<?php

namespace App\Http\Controllers;

use App\Models\Eixo;
use Illuminate\Http\Request;

class EixoController extends Controller
{
    // Lista todos os eixos
    public function index()
    {
        $eixos = Eixo::all();
        return view('eixos.index', compact('eixos'));
    }

    // Mostra o formulário para criar um novo eixo
    public function create()
    {
        return view('eixos.create');
    }

    // Salva um novo eixo no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Eixo::create($request->all());

        return redirect()->route('eixos.index')
            ->with('success', 'Eixo criado com sucesso.');
    }

    // Mostra um eixo específico
    public function show(Eixo $eixo)
    {
        return view('eixos.show', compact('eixo'));
    }

    // Mostra o formulário para editar um eixo existente
    public function edit(Eixo $eixo)
    {
        return view('eixos.edit', compact('eixo'));
    }

    // Atualiza o eixo no banco
    public function update(Request $request, Eixo $eixo)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $eixo->update($request->all());

        return redirect()->route('eixos.index')
            ->with('success', 'Eixo atualizado com sucesso.');
    }

    // Remove o eixo do banco
    public function destroy(Eixo $eixo)
    {
        $eixo->delete();

        return redirect()->route('eixos.index')
            ->with('success', 'Eixo excluído com sucesso.');
    }
}
