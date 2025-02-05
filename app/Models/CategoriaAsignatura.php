<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaAsignatura extends Model
{
    //hasMany/uno a muchos
    public function asignatura(){
        return $this->hasMany(Asignatura::class,'id_categoria_asignatura');
    }
}
