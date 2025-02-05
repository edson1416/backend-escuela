<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class SeccionRequest extends Request
{
    public function commonRules(): array{
        return [
            'seccion' => 'required|string|min:1|max:25',
            'id_horario' => 'required|integer|exists:horarios,id',
            'id_orientador' => 'required|integer|exists:profesores,id',
        ];
    }

    public function commonMessages(): array{
        return [
            'seccion.required' => 'El nombre de la seccion es requerido',
            'seccion.string' => 'El nombre de la seccion debe ser una cadena de texto',
            'seccion.min' => 'El nombre de la seccion debe tener al menos :min caracteres',
            'seccion.max' => 'El nombre de la seccion debe tener maximo :max caracteres',
            'id_horario.required' => 'El id del horario es requerido',
            'id_horario.integer' => 'El id del horario debe ser un entero',
            'id_horario.exists' => 'El id del horario no existe',
            'id_orientador.required' => 'El id del orientador es requerido',
            'id_orientador.integer' => 'El id del orientador debe ser un entero',
            'id_orientador.exists' => 'El id del orientador no existe',
        ];
    }
}
