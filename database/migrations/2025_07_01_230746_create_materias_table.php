<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Eliminar la tabla materias si existe
        Schema::dropIfExists('materias');

        // Crear tabla materias
        Schema::create('materias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('nombre');
            $table->enum('año', ['1ºA','1ºB','2ºA','2ºB','3ºA','3ºB','4ºA','4ºB','5ºA']);
            $table->enum('tipo_cursada', ['mai', 'proyecto', 'eco']);
            $table->string('carrera');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
