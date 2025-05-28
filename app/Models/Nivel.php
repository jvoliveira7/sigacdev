<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

       protected $table = 'niveis';  // Define o nome correto da tabela
       
    protected $fillable = [
        'nome'
    ];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
