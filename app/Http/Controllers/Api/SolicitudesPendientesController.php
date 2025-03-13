<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SolicitudInscripcion;

class SolicitudesPendientesController extends Controller
{
    public function pendientesCount(){
        $solicitudes = SolicitudInscripcion::all()->where('id_estado',1)->count();
        return response()->json(['solicitudes' => $solicitudes]);
    }
}
