<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Declaracao extends Model
{
    use HasFactory;

    protected $table = 'declaracoes';
    
    protected $fillable = [
        'aluno_id',
        'turma_id',
        'data_emissao',
        'arquivo'
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }
}
