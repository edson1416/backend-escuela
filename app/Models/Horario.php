<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horarios';
    protected $fillable = ['nombre','hora_entrada','hora_salida'];
    protected $hidden = ['created_at','updated_at'];

    public function seccion(){
        return $this->hasMany(Seccion::class,'id_horario');
    }
}
