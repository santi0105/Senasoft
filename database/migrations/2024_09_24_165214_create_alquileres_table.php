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
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->dateTime('fechaInicial');
            $table->dateTime('fechaFinal');
            $table->string('tpAlquiler');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_bicicletas');
            $table->foreign('id_bicicletas')->references('id')->on('bicicletas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alquileres');
    }
};
