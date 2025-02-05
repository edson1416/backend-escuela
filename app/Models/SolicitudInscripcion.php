<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudInscripcion extends Model
{
    protected $table = 'solicitud_inscripcion';
    protected $fillable = [
        'nombre_alumno',
        'apellido_alumno',
        'fecha_nacimiento',
        'sexo',
        'correo_alumno',
        'telefono_alumno',
        'direccion_alumno',
        'partida_nacimiento',
        'foto',
        'nombre_responsable',
        'telefono_responsable',
        'correo_responsable',
        'dui',
        'certificado',
        'constancia_conducta',
        'id_grado',
        'id_estado'
    ];

}
