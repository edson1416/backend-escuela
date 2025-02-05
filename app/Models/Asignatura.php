<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturas';
    protected $fillable = ['nombre','descripcion','id_categoria_asignatura'];
    protected $hidden = ['created_at','updated_at'];

    //belongsTo/Muchos a uno
    public function categoriaAsignatura(){

        return $this->belongsTo(CategoriaAsignatura::class, 'id_categoria_asignatura');
    }

    public function ProfesorAsignatura(){
        return $this->hasMany(ProfesorAsignatura::class, 'id_asignatura');
    }
}
