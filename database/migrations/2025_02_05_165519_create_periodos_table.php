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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->float('tarea1')->nullable();
            $table->float('tarea2')->nullable();
            $table->float('tarea3')->nullable();
            $table->float('examen')->nullable();
            $table->float('nota_final')->nullable();
            $table->integer('numero_periodo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos');
    }
};
