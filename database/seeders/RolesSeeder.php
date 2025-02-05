<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'name' => 'administrador',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'director',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'orientador',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'profesor',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'padre',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'alumno',
                'guard_name' => 'sanctum',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ])->each(function($item){
            Role::create($item);
        });
    }
}
