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
        Schema::create('reseñas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_bicicletas')->constrained()->onDelete('cascade'); // Relación con la tabla de bicicletas
            $table->foreignId('id_users')->constrained()->onDelete('cascade'); // Relación con la tabla de usuarios
            $table->text('comentario');
            $table->integer('calificacion')->between(1, 5); // Calificación de 1 a 5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseñas');
    }
};
