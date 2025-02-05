<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PeriodoRequest;
use App\Models\Periodo;
use Orion\Http\Controllers\Controller;

class PeriodoController extends Controller
{
    protected $model = Periodo::class;
    protected $request = PeriodoRequest::class;
}
