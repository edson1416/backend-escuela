<?php

namespace Database\Seeders;

use App\Models\Alumno;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'nombre' => 'Ariel',
                'apellido' => 'Argueta',
                'correo' => 'arielargueta@gmail.com',
                'telefono' => '0000-0001',
                'direccion' => 'San Salvador',
                'fecha_nacimiento' => '2000-04-10',
                'sexo' => 'M',
                'id_user' => 4
            ],
            /*[
                'nombre' => 'Diana',
                'apellido' => 'Portillo',
                'correo' => 'diana@gmail.com',
                'telefono' => '0000-0002',
                'direccion' => 'San Salvador',
                'fecha_nacimiento' => '2001-01-08',
                'sexo' => 'F',
                'grado_actual' => 1
            ]*/
        ])->each(function($alumno) {
            Alumno::create($alumno);
        });
    }
}
