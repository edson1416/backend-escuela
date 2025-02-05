<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Profesor extends Model
{
    protected $table = 'profesores';
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'direccion',
        'id_users',
        'fecha_nacimiento'
    ];

    public function user() : belongsTo {
        return $this->belongsTo(User::class,'id_users');
    }

    public function prefesorAsignatura(){
        return $this->hasMany(ProfesorAsignatura::class,'id_profesor');
    }

    public function seccion(){
        return $this->hasMany(Seccion::class,'id_orientador');
    }


}
