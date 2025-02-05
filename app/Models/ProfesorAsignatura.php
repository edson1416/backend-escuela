<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfesorAsignatura extends Model
{
    protected $table = 'profesor_asignatura';
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['id_profesor', 'id_asignatura'];

    public function profesor(){
        return $this->belongsTo(Profesor::class, 'id_profesor');
    }
    public function asignatura(){
        return $this->belongsTo(Asignatura::class, 'id_asignatura');
    }
}
