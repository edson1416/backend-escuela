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
        Schema::create('notas_asignaturas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_asignatura')->constrained('asignaturas');
            $table->float('periodo1')->nullable();
            $table->float('periodo2')->nullable();
            $table->float('periodo3')->nullable();
            $table->float('nota_final')->nullable();
            $table->foreignId('id_expediente')->constrained('expedientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notas_asignaturas');
    }
};
