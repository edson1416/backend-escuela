<?php

namespace Database\Seeders;

use App\Models\SituacionIngreso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacionIngresoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['situacion' => 'Sin expediente academico', 'descripcion' => 'normalmente Kinder'],
            ['situacion' => 'Estudio anteriormente en otra institucion', 'descripcion' => 'Alumno que viene de otra institucion'],
            ['situacion' => 'Reingreso', 'descripcion' => 'Alumno que estudio anteriormente en esta institucion'],
        ])->each(function ($item) {
            SituacionIngreso::create($item);
        });
    }
}
