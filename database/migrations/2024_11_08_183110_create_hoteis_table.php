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
        Schema::create('hoteis', function (Blueprint $table) {
            $table->id();
            $table->integer('estado_id');
            $table->integer('cidade_id');
            $table->string('hotel');
            $table->text('descricao')->nullable(); // Campo de descrição
            $table->decimal('valor_diaria', 8, 2)->nullable(); // Campo de valor da diária
            $table->integer('quartos');
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoteis');
    }
};
