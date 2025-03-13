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

    public function getPartidaNacimientoAttribute($value){
        return $value ? asset('storage/'.$value) : null;
    }

    public function getFotoAttribute($value){
        return $value ? asset('storage/'.$value) : null;
    }

    public function grado(){
        return $this->belongsTo(Grado::class, 'id_grado');
    }

}
