<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('aluno_turma', function (Blueprint $table) {
            $table->foreignId('aluno_id')->constrained();
            $table->foreignId('turma_id')->constrained();
            $table->date('data_matricula');
            $table->primary(['aluno_id', 'turma_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('aluno_turma');
    }
};