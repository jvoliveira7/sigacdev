<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AlunoController,
    CategoriaController,
    ComprovanteController,
    CursoController,
    DeclaracaoController,
    DocumentoController,
    NivelController,
    TurmaController
};

// Página inicial
Route::get('/', function () {
    return view('welcome'); // você pode mudar para outra view se preferir
});

// Alunos
Route::prefix('alunos')->group(function () {
    Route::get('/', [AlunoController::class, 'index'])->name('alunos.index');
    Route::get('/create', [AlunoController::class, 'create'])->name('alunos.create');
    Route::post('/', [AlunoController::class, 'store'])->name('alunos.store');
    Route::get('/{aluno}', [AlunoController::class, 'show'])->name('alunos.show');
    Route::get('/{aluno}/edit', [AlunoController::class, 'edit'])->name('alunos.edit');
    Route::put('/{aluno}', [AlunoController::class, 'update'])->name('alunos.update');
    Route::delete('/{aluno}', [AlunoController::class, 'destroy'])->name('alunos.destroy');
    Route::get('/{aluno}/comprovantes', [AlunoController::class, 'comprovantes'])->name('alunos.comprovantes');
});

// Categorias
Route::resource('categorias', CategoriaController::class)->except(['show']);

// Cursos
Route::resource('cursos', CursoController::class);



// Documentos
Route::get('documentos/obrigatorios', [DocumentoController::class, 'obrigatorios'])->name('documentos.obrigatorios');
Route::resource('documentos', DocumentoController::class);



// Turmas
Route::post('turmas', [TurmaController::class, 'store'])->name('turmas.store');
Route::resource('turmas', TurmaController::class);

// Níveis
Route::prefix('niveis')->group(function () {
    Route::get('/', [NivelController::class, 'index'])->name('niveis.index');
    Route::get('/create', [NivelController::class, 'create'])->name('niveis.create');
    Route::post('/', [NivelController::class, 'store'])->name('niveis.store');
    Route::get('/{nivel}/edit', [NivelController::class, 'edit'])->name('niveis.edit');
    Route::put('/{nivel}', [NivelController::class, 'update'])->name('niveis.update');
    Route::delete('/{nivel}', [NivelController::class, 'destroy'])->name('niveis.destroy');
});

// Comprovantes
Route::resource('comprovantes', ComprovanteController::class);


// Declarações
Route::prefix('declaracoes')->group(function () {
    Route::get('/', [DeclaracaoController::class, 'index'])->name('declaracoes.index');
    Route::get('/emitir', [DeclaracaoController::class, 'create'])->name('declaracoes.create');
    Route::post('/', [DeclaracaoController::class, 'store'])->name('declaracoes.store');
    Route::get('/{declaracao}/download', [DeclaracaoController::class, 'download'])->name('declaracoes.download');
});

// Relatórios
Route::prefix('relatorios')->group(function () {
    Route::get('/alunos', [AlunoController::class, 'relatorio'])->name('relatorios.alunos');
    Route::get('/turmas', [TurmaController::class, 'relatorio'])->name('relatorios.turmas');
});

// Rota simples para teste
Route::get('/simples', function () {
    return "<h1>Rota Simples</h1>";
});

// Teste com parâmetro
Route::get('/parametro/{id}', function ($id) {
    return "<h1>ID recebido: $id</h1>";
})->where('id', '[0-9]+');

// Fallback personalizado (404)
Route::fallback(function () {
    return view('errors.404');
});

// Rota de login
Route::get('/login', function () {
    return "<h1>Área de login ainda não implementada.</h1>";
})->name('login');
