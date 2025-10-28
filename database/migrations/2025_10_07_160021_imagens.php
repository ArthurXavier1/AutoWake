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
         Schema::create('imagem', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('motorista_id');
            $table->string('modelo');
            $table->year('ano');
            $table->string('placa');
            $table->string('Ratreador');
            
        
            
        });
    }

    /**
     * Reverse the migrations.
     */
   public function down(): void
    {
        Schema::dropIfExists('imagem');
    }
};


