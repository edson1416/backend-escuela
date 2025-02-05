<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creando usuarios de prueba
        $admin = User::create([
            'name' => 'Administrador',
            'email' => 'admin@mail.com',
            'password' => 'admin1416'
        ]);

        $director = User::create([
            'name' => 'Edson Sarmiento',
            'email' => 'edson@mail.com',
            'password' => 'password1416'
        ]);

        $profesor = User::create([
            'name' => 'Claudia Hernandez',
            'email' => 'claudia@mail.com',
            'password' => 'password123'
        ]);

        $alumno = User::create([
            'name' => 'Ariel Argueta',
            'email' => 'arielargueta@gmail.com',
            'password' => 'password123'
        ]);



        //asignado roles assignRole
        $admin->assignRole('administrador');
        $director->assignRole('director');
        $profesor->assignRole('profesor');
        $alumno->assignRole('alumno');

    }
}
