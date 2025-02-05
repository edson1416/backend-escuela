<?php

namespace Database\Seeders;

use App\Models\Grado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
           [
               'grado' => '1° Grado',
               'id_seccion' => 1,
               'id_ciclo' => 1,
           ],
            [
                'grado' => '2° Grado',
                'id_seccion' => 1,
                'id_ciclo' => 1,
            ],
            [
                'grado' => '3° Grado',
                'id_seccion' => 1,
                'id_ciclo' => 1,
            ],
        ])->each(function ($grado) {
            Grado::create($grado);
        });
    }
}
