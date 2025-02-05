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
        Schema::create('profesor_asignatura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesor')->constrained('profesores');
            $table->foreignId('id_asignatura')->constrained('asignaturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesor_asignatura');
    }
};
