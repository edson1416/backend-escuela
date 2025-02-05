<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $table = 'alumnos';
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
        'fecha_nacimiento',
        'sexo',
        'id_user'
    ];

//    public function gradoActual(){
//        return $this->belongsTo(Grado::class, 'grado_actual');
//    }

    public function expediente(){
        return $this->hasMany(Expediente::class,'alumno_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }

}
