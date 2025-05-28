<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ComprovanteController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\DeclaracaoController;
use App\Http\Controllers\EixoController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Autenticação do Breeze
require __DIR__.'/auth.php';

// Rotas protegidas por autenticação
Route::middleware(['auth'])->group(function () {

    // Dashboard usando controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('alunos', AlunoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('comprovantes', ComprovanteController::class);
    Route::resource('documentos', DocumentoController::class);
    Route::resource('declaracoes', DeclaracaoController::class);
    Route::resource('eixos', EixoController::class);
    Route::resource('niveis', NivelController::class);
    Route::resource('turmas', TurmaController::class);
    Route::resource('users', UserController::class);

    // Exemplo: relatório de alunos
    // Route::get('/relatorios/alunos', [RelatorioController::class, 'alunos'])->name('relatorios.alunos');

});
