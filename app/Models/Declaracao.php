<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaracao extends Model
{
    use HasFactory;

    protected $table = 'declaracoes';

    protected $fillable = [
        'hash',
        'data',
        'aluno_id',
        'comprovante_id'
    ];

    protected $casts = [
        'data' => 'datetime'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function comprovante()
    {
        return $this->belongsTo(Comprovante::class);
    }

    // Acessor para a turma através do aluno
    public function getTurmaAttribute()
    {
        return $this->aluno->turma;
    }
}