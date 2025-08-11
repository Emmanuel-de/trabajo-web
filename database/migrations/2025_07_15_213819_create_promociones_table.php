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
        Schema::create('promociones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('expediente_id')->constrained()->onDelete('cascade');
            $table->string('nombre_promocion');
            $table->text('contenido_promocion');
            $table->string('tipo_accion'); // 'generar_promocion', 'subir_anexo', 'firmar_enviar'
            $table->string('estado')->default('borrador'); // 'borrador', 'generada', 'firmada', 'enviada'
            $table->text('archivo_anexo')->nullable();
            $table->string('certificado_firma')->nullable();
            $table->timestamp('fecha_generacion')->nullable();
            $table->timestamp('fecha_firma')->nullable();
            $table->timestamp('fecha_envio')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promociones');
    }
};


