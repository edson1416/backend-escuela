<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class HorarioRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'nombre' => 'string|required|min:3|max:50',
            'hora_entrada' => 'required|date_format:H:i',
            'hora_salida' => 'required|date_format:H:i',
        ];
    }

    public function commonMessages(): array{
        return [
            'nombre.string' => 'El campo nombre debe ser alfanumerico',
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener un maximo de 50 caracteres',
            'hora_entrada.required' => 'El campo hora de entrada es requerido',
            'hora_entrada.date_format' => 'El campo hora de entrada debe tener formato correcto',
            'hora_salida.required' => 'El campo hora salida es requerido',
            'hora_salida.date_format' => 'El campo hora salida debe tener formato correcto',
        ];
    }
}
