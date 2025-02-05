<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nombre' => 'Matematica',
                'descripcion' => 'Lenguaje para interpretar el universo',
                'id_categoria_asignatura' => 1
            ],
            [
                'nombre' => 'Sociales',
                'descripcion' => 'Lenguaje para interpretar las sociedades del mundo',
                'id_categoria_asignatura' => 1
            ],
            [
                'nombre' => 'Ciencia',
                'descripcion' => 'Lenguaje para interpretar el universo',
                'id_categoria_asignatura' => 1
            ],
            [
                'nombre' => 'Lenguaje',
                'descripcion' => 'Comunicacion',
                'id_categoria_asignatura' => 1
            ],
            [
                'nombre' => 'Educacion Financiera',
                'descripcion' => 'Conceptos, documentos y tramites financieros',
                'id_categoria_asignatura' => 2
            ]
            ])->each(function($item){
                Asignatura::create($item);
            });
    }
}
