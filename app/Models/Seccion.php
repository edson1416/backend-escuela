<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = 'secciones';
    protected $fillable = ['seccion','id_horario','id_orientador'];
    protected $hidden = ['created_at','updated_at'];

    public function horario(){
        return $this->belongsTo(Horario::class,'id_horario');
    }

    public function profesor(){
        return $this->belongsTo(Profesor::class,'id_orientador');
    }

    public function grado(){
        return $this->hasMany(Grado::class,'id_seccion');
    }

}
