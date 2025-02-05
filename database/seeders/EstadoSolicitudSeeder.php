<?php

namespace Database\Seeders;

use App\Models\EstadoSolicitud;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadoSolicitudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
           ['estado' => 'pendiente','descripcion' => 'Solicitud de ingreso pendiente de aprobacion'],
           ['estado' => 'aprobado','descripcion' => 'Solicitud aprobada'],
           ['estado' => 'rechazado','descripcion' => 'Solicitud rechazada'],
        ])->each(function($estado) {
            EstadoSolicitud::create($estado);
        });
    }
}
