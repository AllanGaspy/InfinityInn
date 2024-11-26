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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('estado_id');
            $table->integer('cidade_id');
            $table->string('hotel')->nullable(); //nullable somente para teste, retirar depois
            $table->integer('hotel_id');
            $table->integer('quartos');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->date('check_in')->nullable();
            $table->date('check_out')->nullable();
            $table->timestamps();
            $table->integer('guests')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
