<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotasAsignatura extends Model
{
    protected $fillable = [
        'id_asignatura',
        'periodo1',
        'periodo2',
        'periodo3',
        'nota_final',
        'id_expediente',
    ];
}
