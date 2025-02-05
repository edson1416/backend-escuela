<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call([
            //seeder roles
            RolesSeeder::class,

            //seeder usuarios
            userSeeder::class,

            //seeders catalogos
            CategoriaAsignaturaSeeder::class,
            AsignaturaSeeder::class,
            CicloSeeder::class,
            HorarioSeeder::class,
            ProfesorSeeder::class,
            SeccionSeeder::class,
            GradoSeeder::class,
            AlumnoSeeder::class,
            SituacionIngresoSeeder::class,
            EstadoSolicitudSeeder::class,
        ]);
    }
}
