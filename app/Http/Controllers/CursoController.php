<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Categoria;
use App\Models\Nivel;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['categoria', 'nivel'])->paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $niveis = Nivel::all();
        return view('cursos.create', compact('categorias', 'niveis'));
    }

    // Outros métodos
}