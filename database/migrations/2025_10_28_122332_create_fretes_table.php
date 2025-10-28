<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFretesTable extends Migration
{
    public function up()
    {
        Schema::create('fretes', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->string('email_comerciante');
            $table->string('marca_produto');
            $table->string('ano_fabricacao', 4);
            $table->string('nome_motorista');
            $table->string('telefone')->nullable();
            $table->string('tipo_carga');
            $table->float('capacidade_carga')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps(); // Cria as colunas created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('fretes');
    }
}