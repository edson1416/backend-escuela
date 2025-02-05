<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
    protected $hidden = ['created_at', 'updated_at'];

    public function grado(){
        return $this->hasMany(Grado::class,'id_ciclo');
    }
}
