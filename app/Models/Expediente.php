<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table = 'expedientes';
    protected $fillable = ['alumno_id', 'grado_id', 'record_year'];

    public function alumno(){
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }

    public function grado(){
        return $this->belongsTo(Grado::class, 'grado_id');
    }
}
