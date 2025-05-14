@extends('layouts.app') {{-- ou 'layouts.master' dependendo do layout usado --}}

@section('content')
    <div class="container">
        <h1>Relatório de Alunos</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Turma</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alunos as $aluno)
                    <tr>
                        <td>{{ $aluno->nome }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->turma->nome ?? 'Sem turma' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
