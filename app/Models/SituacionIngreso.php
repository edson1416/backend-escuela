<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SituacionIngreso extends Model
{
    protected $table = 'situacion_ingreso';
    protected $fillable = ['situacion','descripcion'];
    protected $hidden = ['created_at','updated_at'];
}
