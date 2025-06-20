<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id(); // Columna auto-incremental para el ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea para el usuario que registra el expediente

            $table->string('juzgado');
            $table->string('numero_expediente')->unique(); // El número de expediente debería ser único
            $table->string('juicio');
            $table->string('promovente');
            $table->string('demandado');
            $table->date('fecha_inicio');
            $table->string('estado_actual'); // ej. 'en_tramite', 'archivado', 'finalizado', 'pausado'
            $table->text('observaciones')->nullable(); // Campo de texto para observaciones, puede ser nulo

            $table->timestamps(); // Columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expedientes');
    }
};
