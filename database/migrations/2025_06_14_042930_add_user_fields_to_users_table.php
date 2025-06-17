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
        Schema::table('users', function (Blueprint $table) {
            // Datos personales
            $table->string('nombre')->after('name');
            $table->string('apellido_paterno')->after('nombre');
            $table->string('apellido_materno')->nullable()->after('apellido_paterno');
            $table->enum('genero', ['masculino', 'femenino', 'otro'])->after('apellido_materno');
            $table->enum('escolaridad', ['primaria', 'secundaria', 'bachillerato', 'licenciatura', 'posgrado'])->after('genero');
            
            // Teléfonos
            $table->string('telefono_oficina', 10)->nullable()->after('escolaridad');
            $table->string('extension', 10)->nullable()->after('telefono_oficina');
            $table->string('telefono_particular', 10)->nullable()->after('extension');
            $table->string('telefono_celular', 10)->nullable()->after('telefono_particular');
            
            // Domicilio
            $table->string('calle')->after('telefono_celular');
            $table->string('numero', 20)->after('calle');
            $table->string('entre_calles')->nullable()->after('numero');
            $table->string('colonia')->nullable()->after('entre_calles');
            $table->string('codigo_postal', 5)->nullable()->after('colonia');
            $table->enum('pais', ['México', 'Otro'])->default('México')->after('codigo_postal');
            $table->string('estado')->default('TAMAULIPAS')->after('pais');
            $table->string('municipio')->after('estado');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nombre',
                'apellido_paterno', 
                'apellido_materno',
                'genero',
                'escolaridad',
                'telefono_oficina',
                'extension',
                'telefono_particular',
                'telefono_celular',
                'calle',
                'numero',
                'entre_calles',
                'colonia',
                'codigo_postal',
                'pais',
                'estado',
                'municipio'
            ]);
        });
    }
};