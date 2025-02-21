<?php

namespace App\Http\Controllers\Api;


use App\Models\Grado;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class GradoController extends Controller
{
    protected $model = Grado::class;

    public function filterableBy(): array
    {
        return [
            'id_ciclo',
            'id_seccion',
            'seccion.id_horario'
        ];
    }

    public function alwaysIncludes(): array
    {
        return ['seccion', 'seccion.horario', 'seccion.profesor', 'ciclo'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with([
            'seccion' => function ($query) {
                $query->with(['profesor' => function ($query) {
                    $query->select(['id', 'nombre', 'apellido', 'email', 'telefono']);
                }]);
            },
            'ciclo' => function ($query) {
                $query->select(['id', 'ciclo']);
            }
        ]);

        return $query;
    }

    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit)
    {
        if ($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);
    }

}
