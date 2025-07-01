<<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Eliminar la tabla horarios si existe
        Schema::dropIfExists('horarios');

        // Crear tabla horarios
        Schema::create('horarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('codigo')->unique();
            $table->enum('dia', ['lunes', 'martes', 'miércoles', 'jueves', 'viernes'])->default('lunes');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->enum('turno', ['mañana', 'tarde'])->default('mañana');
            $table->boolean('necesita_reserva')->default(false);
            $table->string('periodo')->default('regular');
            // clave foránea con tipo compatible (unsignedBigInteger)
            $table->foreignId('materia_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horarios');
    }
};
