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
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('marca');
            $table->string('color');
            $table->string('estado');
            $table->double('precioHora');
            $table->unsignedBigInteger('id_centros');
            $table->foreign('id_centros')->references('id')->on('centros')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bicicletas');
    }
};
