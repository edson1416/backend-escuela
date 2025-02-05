<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['nombre' => 'Matutino', 'hora_entrada' => '07:00', 'hora_salida' => '12:00'],
            ['nombre' => 'Vespertino', 'hora_entrada' => '13:00', 'hora_salida' => '18:00'],
        ])->each(function ($horario) {
            Horario::create($horario);
        });
    }
}
