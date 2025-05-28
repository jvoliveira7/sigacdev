<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('sigla', 10)->unique();
            $table->integer('total_horas')->unsigned();
            $table->foreignId('nivel_id')->constrained('niveis')->onDelete('cascade');
            $table->foreignId('eixo_id')->constrained('eixos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
