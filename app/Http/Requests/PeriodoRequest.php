<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class PeriodoRequest extends Request
{

    public function commonRules(): array
    {
        return [
            'tarea1' => 'numeric|min:0|nullable',
            'tarea2' => 'numeric|min:0|nullable',
            'tarea3' => 'numeric|min:0|nullable',
            'examen' => 'numeric|min:0|nullable',
            'nota_final' => 'numeric|min:0|nullable',
            'numero_periodo' => 'required|integer|min:1|max:3',
        ];
    }

    public function commonMessages(): array{
        return [
            'tarea1.numeric' => 'El campo tarea 1 debe ser numerico',
            'tarea1.min' => 'El campo tarea 1 debe tener un minimo de :min',
            'tarea2.numeric' => 'El campo tarea 2 debe ser numerico',
            'tarea2.min' => 'El campo tarea 2 debe tener un minimo de :min',
            'tarea3.numeric' => 'El campo tarea 3 debe ser numerico',
            'tarea3.min' => 'El campo tarea 3 debe tener un minimo de :min',
            'examen.numeric' => 'El campo examen debe ser numerico',
            'examen.min' => 'El campo examen debe tener un minimo de :min',
            'nota_final.numeric' => 'El campo nota final debe ser numerico',
            'nota_final.min' => 'El campo nota final debe ser numerico',
            'numero_periodo.required' => 'El campo numero periodo es obligatorio',
            'numero_periodo.integer' => 'El campo numero periodo debe ser numerico',
            'numero_periodo.min' => 'El campo numero periodo debe tener un minimo de :min',
            'numero_periodo.max' => 'El campo numero periodo debe tener un maximo de :max',
        ];
    }

}
