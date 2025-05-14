<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comprovantes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained();
            $table->foreignId('documento_id')->constrained();
            $table->date('data_emissao');
            $table->string('arquivo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('comprovantes');
    }
};