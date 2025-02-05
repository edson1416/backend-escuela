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
        Schema::create('solicitud_inscripcion', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alumno');
            $table->string('apellido_alumno');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('correo_alumno');
            $table->string('telefono_alumno')->nullable();
            $table->string('direccion_alumno');
            $table->string('partida_nacimiento'); //logica de imagenes pendiente
            $table->string('foto');
            $table->string('nombre_responsable');
            $table->string('telefono_responsable')->nullable();
            $table->string('correo_responsable');
            $table->string('dui');
            $table->string('certificado');
            $table->string('constancia_conducta')->nullable();
            $table->foreignId('id_grado')->constrained('grados');
            $table->foreignId('id_estado')->constrained('estado_solicitudes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_inscripcion');
    }
};
