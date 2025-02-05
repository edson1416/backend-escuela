<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ExpedienteRequest;
use App\Models\Expediente;
use Orion\Http\Controllers\Controller;

class ExpedienteController extends Controller
{
    protected $model = Expediente::class;
    protected $request = ExpedienteRequest::class ;

    public function alwaysIncludes(): array
    {
        return ['alumno','grado','grado.seccion'];
    }
}
