<?php

namespace App\Http\Controllers\Api;



use App\Models\SituacionIngreso;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class SituacionIngresoController extends Controller
{
    protected $model = SituacionIngreso::class;

    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit)
    {
        if($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);

    }
}
