<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('produtos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('categoria')->nullable();
        $table->decimal('preco', 10, 2)->default(0);
        $table->float('peso')->nullable();
        $table->string('dimensoes')->nullable(); // Ex: "30x20x15cm"
        $table->string('local_retirada')->nullable();
        $table->text('descricao')->nullable();
        $table->integer('quantidade')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
