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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            
            // Información básica del reporte
            $table->string('titulo', 255);
            $table->text('descripcion');
            $table->date('fecha_reporte');
            
            // Tipo y estado del reporte
            $table->enum('tipo', ['expedientes', 'promociones', 'estadisticas', 'general'])
                  ->default('general');
            $table->enum('estado', ['activo', 'archivado', 'finalizado', 'pausado'])
                  ->default('activo');
            
            // Relación con usuario
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade')
                  ->comment('Usuario que creó el reporte');
            
            // Contenido del reporte en formato JSON
            $table->json('contenido_json')
                  ->nullable()
                  ->comment('Datos específicos del reporte en formato JSON');
            
            // Información de archivos generados (opcional)
            $table->string('archivo_path', 500)
                  ->nullable()
                  ->comment('Ruta del archivo exportado si existe');
            
            $table->enum('formato_exportacion', ['pdf', 'excel', 'csv', 'json'])
                  ->nullable()
                  ->comment('Formato del último archivo exportado');
            
            // Metadatos adicionales
            $table->integer('total_registros')
                  ->default(0)
                  ->comment('Número total de registros incluidos en el reporte');
            
            $table->decimal('tamaño_archivo', 10, 2)
                  ->nullable()
                  ->comment('Tamaño del archivo exportado en MB');
            
            // Configuración de filtros aplicados (JSON)
            $table->json('filtros_aplicados')
                  ->nullable()
                  ->comment('Filtros que se aplicaron para generar el reporte');
            
            // Timestamps y soft deletes
            $table->timestamps();
            $table->softDeletes();
            
            // Índices para optimizar consultas
            $table->index(['user_id', 'tipo']);
            $table->index(['user_id', 'estado']);
            $table->index(['fecha_reporte']);
            $table->index(['created_at']);
            $table->index(['tipo', 'estado']);
            
            // Índice compuesto para consultas frecuentes
            $table->index(['user_id', 'tipo', 'estado'], 'idx_user_tipo_estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reportes');
    }
};
