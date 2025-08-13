<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();

            // Datos principales
            $table->string('tipo_asunto', 30);        // Legal | Administrativo | Informativo | Financiero
            $table->string('estado', 10)->default('Pendiente'); // Pendiente | Leido
            $table->date('fecha');
            $table->string('expediente', 64);

            // Texto libre
            $table->text('descripcion')->nullable();

            $table->timestamps();

            // Índices útiles para búsquedas/filtrado
            $table->index('estado');
            $table->index('fecha');
            $table->index('expediente');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notificaciones');
    }
};
