<?php

namespace App\Http\Controllers\Api;



use App\Http\Requests\ProfesorAsignaturaRequest;
use App\Models\ProfesorAsignatura;
use Orion\Http\Controllers\Controller;

class ProfesorAsignaturaController extends Controller
{
    protected $model = ProfesorAsignatura::class;
    protected $request = ProfesorAsignaturaRequest::class;

    public function alwaysIncludes(): array
    {
        return ['profesor','asignatura'];
    }

}
