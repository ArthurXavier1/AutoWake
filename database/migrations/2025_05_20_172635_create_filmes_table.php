<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filmes', function (Blueprint $table) {
            $table->id();
            $table->text('nome');
            $table->text('sinopse');
            $table->string('img_filme');
            $table->date('data_publicacao');
            $table->string('classificacao');
            $table->text('genero');
            $table->text('subgenero');
            $table->text('direcao');
            $table->text('atores');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('filmes');
    }
};
