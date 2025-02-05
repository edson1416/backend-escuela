<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ExpedienteRequest;
use App\Models\Expediente;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class ExpedienteController extends Controller
{
    protected $model = Expediente::class;
    protected $request = ExpedienteRequest::class ;

    public function alwaysIncludes(): array
    {
        return ['alumno','grado','grado.seccion','NotasAsignadas','NotasAsignadas.asignatura','NotasAsignadas.periodo'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with(['NotasAsignadas' => function ($query) {
            $query->with(['asignatura' => function ($query) {
                $query->select('id','nombre');
            }]);
        }]);

        return $query;
    }
}
