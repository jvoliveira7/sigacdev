<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with(['turmas'])->paginate(10);
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:alunos,email',
            'cpf' => 'required|string|size:11|unique:alunos,cpf',
            'telefone' => 'required|string|max:20'
        ]);

        // Formata o CPF para armazenar apenas números
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);

        Aluno::create($validated);

        return redirect()->route('alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }

    public function show(Aluno $aluno)
    {
        return view('alunos.show', compact('aluno'));
    }

    public function edit(Aluno $aluno)
    {
        return view('alunos.edit', compact('aluno'));
    }

public function relatorio()
{
    $alunos = Aluno::with('turma')->get();
    return view('alunos.relatorio', compact('alunos'));
}


    public function update(Request $request, Aluno $aluno)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => [
                'required',
                'email',
                Rule::unique('alunos')->ignore($aluno->id)
            ],
            'cpf' => [
                'required',
                'string',
                'size:11',
                Rule::unique('alunos')->ignore($aluno->id)
            ],
            'telefone' => 'required|string|max:20'
        ]);

        // Formata o CPF para armazenar apenas números
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);

        $aluno->update($validated);

        return redirect()->route('alunos.show', $aluno->id)
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')
            ->with('success', 'Aluno removido com sucesso!');
    }
}