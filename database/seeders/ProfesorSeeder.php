<?php

namespace Database\Seeders;

use App\Models\Profesor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfesorSeeder extends Seeder
{
    /**
     * Seeder de profesor para tener un orientador default para las secciones.
     * el id del usuario hace referencia al usuario creado en userSeeder
     */
    public function run(): void
    {
        Profesor::create([
            'nombre' => 'profesor 1',
            'apellido' => 'default',
            'email' => 'claudia@mail.com',//email tomado del userSeeder
            'telefono' => '545454545',
            'id_users' => 3
        ]);
    }
}
