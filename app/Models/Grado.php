<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    protected $table = 'grados';
    protected $fillable = ['grado','id_seccion','id_ciclo'];
    protected $hidden = ['created_at','updated_at'];

    public function seccion(){
        return $this->belongsTo(Seccion::class,'id_seccion');
    }

    public function ciclo(){
        return $this->belongsTo(Ciclo::class,'id_ciclo');
    }

    public function alumno(){
        return $this->hasMany(Alumno::class,'grado_actual');
    }

    public function expediente(){
        return $this->hasMany(Expediente::class,'grado_id');
    }

    public function solicitudes(){
        return $this->hasMany(SolicitudInscripcion::class,'id_grado');
    }
}

