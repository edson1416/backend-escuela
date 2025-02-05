<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoSolicitud extends Model
{
    protected $table = 'estado_solicitudes';
    protected $hidden = ['created_at','updated_at'];
}
