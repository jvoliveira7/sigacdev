<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nome', 100);
            $table->string('email', 100)->unique();
            $table->string('cpf', 11)->unique();
            $table->string('telefone', 20);
            $table->unsignedBigInteger('curso_id');  // coluna curso_id
            $table->unsignedBigInteger('turma_id');  // coluna turma_id
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('restrict');
            $table->foreign('turma_id')->references('id')->on('turmas')->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alunos');
    }
};
