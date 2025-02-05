<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\SeccionRequest;
use App\Models\Seccion;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class SeccionController extends Controller
{
    protected $model = Seccion::class;
    protected $request = SeccionRequest::class;

    public function alwaysIncludes(): array
    {
        return ['horario', 'profesor'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with(['profesor' => function ($query) {
            $query->select(['id', 'nombre', 'apellido','email']);
        }]);

        return $query;
    }

    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit)
    {
        if($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);
    }
}
