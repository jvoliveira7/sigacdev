<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained();
            $table->string('codigo', 50)->unique();
            $table->string('nome', 100); // Adiciona a coluna 'nome'
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->string('horario', 50);
            $table->integer('vagas');
            $table->string('local', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turmas');
    }
};
