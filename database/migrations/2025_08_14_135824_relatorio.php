<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('relatorios', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('motorista');
            $table->string('placa');
            $table->string('origem');
            $table->string('destino');
            $table->decimal('km', 8, 2); // até 999999.99 km
            $table->string('tempo');
            $table->string('combustivel');
            $table->integer('paradas');
            $table->text('eventos');
            $table->text('ocorrencias');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('relatorios');
    }
};