<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'curso_id',
        'codigo',
        'data_inicio',
        'data_fim',
        'horario',
        'vagas',
        'local'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class);
    }

    public function declaracoes()
    {
        return $this->hasMany(Declaracao::class);
    }
}