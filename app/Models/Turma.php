<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'ano'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alunos()
    {
        return $this->hasMany(Aluno::class); // Turma_id direto no aluno
    }

    public function alunosPivot()
    {
        return $this->belongsToMany(Aluno::class, 'aluno_turma');
    }

    public function declaracoes()
    {
        return $this->hasMany(Declaracao::class);
    }
}
