<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
    {
        Schema::create('velas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_inicio');
            $table->date('data_final');
            $table->string('desempenho');
            $table->date('emitido');
            $table->string('assinatura');
            $table->timestamps(); // cria os campos created_at e updated_at automaticamente
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('velas');
    }
};
