<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comprovante extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'documento_id',
        'data_emissao',
        'arquivo' // Removi 'observacoes' pois pode ser redundante com o tipo de documento
    ];

    protected $casts = [
        'data_emissao' => 'date' // Garante que a data seja tratada como Carbon
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class)->select(['id', 'nome', 'cpf']);
    }

    public function documento()
    {
        return $this->belongsTo(Documento::class)->select(['id', 'nome']);
    }

    // Método de acesso para URL do arquivo
    public function getArquivoUrlAttribute()
    {
        return $this->arquivo ? asset('storage/' . $this->arquivo) : null;
    }
}