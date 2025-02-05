<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'ciclo' => 'Primer ciclo',
                'descripcion' => 'Ciclo compuesto normalmente por 1er, 2do y 3er grado',
            ],
            [
                'ciclo' => 'Segundo ciclo',
                'descripcion' => 'Ciclo compuesto normalmente por 4to, 5to y 6to grado',
            ],
            [
                'ciclo' => 'Tercer ciclo',
                'descripcion' => 'Ciclo compuesto normalmente por 7mo, 8vo y 9no grado',
            ],
            [
                'ciclo' => 'Educacion Media',
                'descripcion' => 'Compuesto por Bachillerato ya sea tecnico o general',
            ],
        ])->each(function($item){
            Ciclo::create($item);
        });
    }
}
