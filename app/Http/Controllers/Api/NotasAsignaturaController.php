<?php

namespace App\Http\Controllers\Api;



use App\Http\Requests\NotasAsignaturaRequest;
use App\Models\NotasAsignatura;
use Orion\Http\Controllers\Controller;

class NotasAsignaturaController extends Controller
{
    protected $model = NotasAsignatura::class;
    protected $request = NotasAsignaturaRequest::class;
}
