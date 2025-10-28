<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Execute as alterações da migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' como chave primária
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('cargo');
            $table->decimal('salario', 10, 2); // Cria a coluna 'salario' com 10 dígitos no total e 2 casas decimais
            $table->timestamps(); // Cria as colunas 'created_at' e 'updated_at'
        });
    }

    /**
     * Reverter as alterações da migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}