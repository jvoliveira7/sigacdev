<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Models\Curso;  // Certifique-se de que o relacionamento com Curso existe
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    // Método para exibir todas as turmas
    public function index()
    {
        // Pega todas as turmas e retorna para a view 'turmas.index'
        $turmas = Turma::paginate(10);
        return view('turmas.index', compact('turmas'));
    }

    // Método para exibir o formulário de criação de turma
    public function create()
    {
        // Carregar cursos para seleção ao criar uma turma
        $cursos = Curso::all();
        return view('turmas.create', compact('cursos'));
    }

    // Método para armazenar uma nova turma
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id',  // Validando se o curso existe
        ]);

        // Criação da turma com os dados validados
        Turma::create($validated);

        // Redireciona para a lista de turmas com uma mensagem de sucesso
        return redirect()->route('turmas.index')->with('success', 'Turma criada com sucesso!');
    }

    // Método para exibir os detalhes de uma turma
    public function show(Turma $turma)
    {
        // Carregar o curso associado à turma
        $turma->load('curso'); // Assume que há um relacionamento 'curso' no modelo Turma
        return view('turmas.show', compact('turma'));
    }

    // Método para exibir o formulário de edição de uma turma
    public function edit(Turma $turma)
    {
        // Carregar cursos para seleção ao editar a turma
        $cursos = Curso::all();
        return view('turmas.edit', compact('turma', 'cursos'));
    }

    // Método para atualizar uma turma existente
    public function update(Request $request, Turma $turma)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'curso_id' => 'required|exists:cursos,id', // Validando se o curso existe
        ]);

        // Atualizando os dados da turma com os dados validados
        $turma->update($validated);

        // Redireciona para a página de detalhes da turma com uma mensagem de sucesso
        return redirect()->route('turmas.show', $turma->id)->with('success', 'Turma atualizada com sucesso!');
    }

    // Método para excluir uma turma
    public function destroy(Turma $turma)
    {
        // Exclui a turma selecionada
        $turma->delete();

        // Redireciona de volta à lista de turmas com uma mensagem de sucesso
        return redirect()->route('turmas.index')->with('success', 'Turma excluída com sucesso!');
    }

    // Método para gerar relatório de turmas em CSV
    public function relatorio()
    {
        // Pega todas as turmas
        $turmas = Turma::with('curso')->get(); // Inclui o relacionamento com o curso

        // Nome do arquivo CSV
        $filename = "relatorio_turmas.csv";

        // Cabeçalhos HTTP para forçar download do arquivo
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Abre o arquivo para escrita na saída
        $handle = fopen('php://output', 'w');

        // Adiciona os cabeçalhos das colunas
        fputcsv($handle, ['ID', 'Nome da Turma', 'Curso', 'Data de Criação']);

        // Adiciona os dados das turmas
        foreach ($turmas as $turma) {
            fputcsv($handle, [
                $turma->id,
                $turma->nome,
                $turma->curso->nome ?? 'Sem curso', // Verifica se o curso existe
                $turma->created_at->format('d/m/Y')
            ]);
        }

        // Fecha o arquivo e encerra o script
        fclose($handle);
        exit;
    }
}
