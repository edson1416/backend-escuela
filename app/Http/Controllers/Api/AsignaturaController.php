<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AsignaturaRequest;
use App\Models\Asignatura;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request as RequestsRequest;

class AsignaturaController extends Controller
{
    protected $model = Asignatura::class;
    protected $request = AsignaturaRequest::class;

    //incluir relaciones
    public function alwaysIncludes(): array
    {
        return ['categoriaAsignatura'];
    }

    public function filterableBy(): array
    {
        return [
            'id_categoria_asignatura',
        ];
    }

    //personalizando el GET INDEX
    protected function buildIndexFetchQuery(RequestsRequest $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);
        $query->with([
            'categoriaAsignatura' => function($query){
                $query->select('id','nombre','descripcion');
            }
        ]);

        return $query;
    }

    //al correr el GET INDEX
    protected function runIndexFetchQuery(RequestsRequest $request, Builder $query, int $paginationLimit)
    {
        //validacion paginacion
        if($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);
    }


}
