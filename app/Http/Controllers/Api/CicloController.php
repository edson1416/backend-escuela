<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoriaAsignaturaRequest;
use App\Models\Ciclo;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request as RequestsRequest;

class CicloController extends Controller
{
    protected $model = Ciclo::class;
    protected $request = CategoriaAsignaturaRequest::class;

    protected function runIndexFetchQuery(RequestsRequest $request, Builder $query, int $paginationLimit)
    {
        if($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);
    }
}
