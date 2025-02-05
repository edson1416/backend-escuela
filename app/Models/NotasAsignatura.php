<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotasAsignatura extends Model
{
    protected $table = 'notas_asignaturas';
    protected $fillable = [
        'id_asignatura',
        'id_periodo',
        'id_expediente',
    ];
    protected $hidden = ['created_at','updated_at'];

    public function asignatura(){
        return $this->belongsTo(Asignatura::class,'id_asignatura');
    }

    public function periodo(){
        return $this->belongsTo(Periodo::class,'id_periodo');
    }

    public function expediente(){
        return $this->belongsTo(Expediente::class,'id_expediente');
    }
}
