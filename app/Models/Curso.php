<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'nivel_id',
        'nome',
        'descricao',
        'carga_horaria',
        'valor'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class);
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}