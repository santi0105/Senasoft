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
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alquileres');
            $table->foreign('id_alquileres')->references('id')->on('alquileres')->onDelete('cascade');
            $table->unsignedBigInteger('id_entregas');
            $table->foreign('id_entregas')->references('id')->on('entregas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estadisticas');
    }
};
