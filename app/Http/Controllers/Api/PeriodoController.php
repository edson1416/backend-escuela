<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PeriodoRequest;
use App\Models\Periodo;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class PeriodoController extends Controller
{
    protected $model = Periodo::class;
    //protected $request = PeriodoRequest::class;

    protected function beforeUpdate(Request $request, Model $entity)
    {
        $porcentajeTarea1 = $request->tarea1*0.2;
        $porcentajeTarea2 = $request->tarea2*0.2;
        $porcentajeTarea3 = $request->tarea3*0.2;
        $porcentajeExamen = $request->examen*0.4;

        $notaFinal = $porcentajeTarea1 + $porcentajeTarea2 + $porcentajeTarea3 + $porcentajeExamen;

        $request->merge(['nota_final' => $notaFinal]);
    }
}
