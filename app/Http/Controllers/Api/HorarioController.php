<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\HorarioRequest;
use App\Models\Horario;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class HorarioController extends Controller
{
    protected $model = Horario::class;
    protected $request = HorarioRequest::class;

    protected function runIndexFetchQuery(Request $request, Builder $query, int $paginationLimit)
    {
        if ($request->pagination == 'false') return $query->get();
        return $query->paginate($paginationLimit);
    }

}
