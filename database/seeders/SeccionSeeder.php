<?php

namespace Database\Seeders;

use App\Models\Seccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Seccion::create([
            'seccion' => 'Seccion A',
            'id_horario' => 1,
            'id_orientador' => 1,
        ]);
    }
}
