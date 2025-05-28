<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Apenas usuários autenticados podem acessar
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar a view dashboard
    public function index()
    {
        return view('dashboard');
    }
}
