<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = [
        'tarea1', 'tarea2', 'tarea3', 'examen', 'nota_final', 'numero_periodo',
    ];

    public function NotasAsignaturas(){
        return $this->hasMany(NotasAsignatura::class, 'id_periodo');
    }
}
