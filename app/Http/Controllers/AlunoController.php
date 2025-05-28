<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlunoController extends Controller
{
    // Listar alunos com cursos e turmas carregados
    public function index()
    {
        $alunos = Aluno::with(['curso', 'turmas'])->paginate(10);
        return view('alunos.index', compact('alunos'));
    }

    // Exibir formulário de criação de aluno, enviando lista de cursos e turmas para seleção
    public function create()
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        return view('alunos.create', compact('cursos', 'turmas'));
    }

    // Salvar novo aluno
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:alunos,email',
            'cpf' => 'required|string|size:11|unique:alunos,cpf',
            'telefone' => 'required|string|max:20',
            'curso_id' => 'nullable|exists:cursos,id',
            'turma_id' => 'nullable|exists:turmas,id',
        ]);

        // Limpa o CPF para armazenar só números
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);

        // Se usuário autenticado, associa o user_id automaticamente
        if (auth()->check()) {
            $validated['user_id'] = auth()->id();
        }

        $aluno = Aluno::create($validated);

        // Se turma_id foi enviado, cria associação many-to-many na tabela pivot
        if (!empty($validated['turma_id'])) {
            $aluno->turmas()->attach($validated['turma_id'], ['data_matricula' => now()]);
        }

        return redirect()->route('alunos.index')->with('success', 'Aluno criado com sucesso!');
    }

    // Mostrar detalhes do aluno com curso, turmas, comprovantes e declarações
    public function show(Aluno $aluno)
    {
        $aluno->load(['curso', 'turmas', 'comprovantes', 'declaracoes']);
        return view('alunos.show', compact('aluno'));
    }

    // Formulário para editar aluno
    public function edit(Aluno $aluno)
    {
        $cursos = Curso::all();
        $turmas = Turma::all();
        $aluno->load('turmas');
        return view('alunos.edit', compact('aluno', 'cursos', 'turmas'));
    }

    // Atualizar aluno
    public function update(Request $request, Aluno $aluno)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => ['required', 'email', Rule::unique('alunos')->ignore($aluno->id)],
            'cpf' => ['required', 'string', 'size:11', Rule::unique('alunos')->ignore($aluno->id)],
            'telefone' => 'required|string|max:20',
            'curso_id' => 'nullable|exists:cursos,id',
            'turma_id' => 'nullable|exists:turmas,id',
        ]);

        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);

        $aluno->update($validated);

        // Atualiza associação many-to-many turmas (se turma_id enviado, sincroniza)
        if (isset($validated['turma_id'])) {
            $aluno->turmas()->sync([$validated['turma_id']]);
        }

        return redirect()->route('alunos.show', $aluno->id)->with('success', 'Aluno atualizado com sucesso!');
    }

    // Excluir aluno (soft delete)
    public function destroy(Aluno $aluno)
    {
        $aluno->delete();
        return redirect()->route('alunos.index')->with('success', 'Aluno removido com sucesso!');
    }

    // Adicionar uma turma ao aluno (many-to-many)
    public function adicionarTurma(Request $request, Aluno $aluno)
    {
        $request->validate([
            'turma_id' => 'required|exists:turmas,id',
        ]);

        if (!$aluno->turmas()->where('turma_id', $request->turma_id)->exists()) {
            $aluno->turmas()->attach($request->turma_id, ['data_matricula' => now()]);
            return back()->with('success', 'Aluno matriculado na turma com sucesso!');
        }

        return back()->with('error', 'Aluno já está matriculado nesta turma.');
    }

    // Remover turma do aluno
    public function removerTurma(Aluno $aluno, Turma $turma)
    {
        if ($aluno->turmas()->where('turma_id', $turma->id)->exists()) {
            $aluno->turmas()->detach($turma->id);
            return back()->with('success', 'Aluno removido da turma com sucesso!');
        }

        return back()->with('error', 'Aluno não está matriculado nessa turma.');
    }
}
