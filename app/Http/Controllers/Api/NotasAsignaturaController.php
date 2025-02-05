<?php

namespace App\Http\Controllers\Api;



use App\Http\Requests\NotasAsignaturaRequest;
use App\Models\NotasAsignatura;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class NotasAsignaturaController extends Controller
{
    protected $model = NotasAsignatura::class;
    protected $request = NotasAsignaturaRequest::class;

    public function alwaysIncludes(): array
    {
        return ['asignatura', 'periodo'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with(['asignatura' => function ($query) {
            $query->select(['id', 'nombre']);
        }]);

        return $query;
    }

}
