<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'obrigatorio'];

    public function comprovantes()
    {
        return $this->hasMany(Comprovante::class);
    }
}