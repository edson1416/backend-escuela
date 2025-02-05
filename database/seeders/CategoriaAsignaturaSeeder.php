<?php

namespace Database\Seeders;

use App\Models\CategoriaAsignatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaAsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nombre' => 'Asignatura Basica',
                'descripcion' => 'Asignaturas usadas en grados basicos y bachillerato'
            ],
            [
                'nombre' => 'Asignatura Avanzada',
                'descripcion' => 'Asignaturas usadas en bachillerato'
            ]
        ])->each(function ($item){
            CategoriaAsignatura::create($item);
        });
    }
}
