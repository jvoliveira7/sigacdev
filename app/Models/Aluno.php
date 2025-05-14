<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'email',
        'cpf',
        'telefone'
    ];

    protected $casts = [
        'cpf' => 'string' // Para garantir que o CPF mantenha zeros à esquerda
    ];

    public function turmas()
    {
        return $this->belongsToMany(Turma::class);
    }

    public function turma()
{
    return $this->belongsTo(Turma::class);
}

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }

    public function declaracoes()
    {
        return $this->hasMany(Declaracao::class);
    }
}