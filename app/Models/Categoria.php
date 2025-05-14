<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao'
    ];

    protected $casts = [
        'created_at' => 'datetime:d/m/Y H:i',
        'updated_at' => 'datetime:d/m/Y H:i'
    ];

    public function cursos(): HasMany
    {
        return $this->hasMany(Curso::class);
    }

    /**
     * Escopo para filtrar categorias ativas (com cursos)
     */
    public function scopeComCursos($query)
    {
        return $query->whereHas('cursos');
    }

    /**
     * Acessor para nome formatado
     */
    public function getNomeFormatadoAttribute(): string
    {
        return ucwords(strtolower($this->nome));
    }
}