<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class ProfesorAsignaturaRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'id_profesor' => 'required|integer|exists:profesores,id',
            'id_asignatura' => 'required|integer|exists:asignaturas,id',
        ];
    }

    public function commonMessages(): array{
        return [
            'id_profesor.required' => 'El campo profesor es requerido',
            'id_asignatura.required' => 'El campo asignatura es requerido',
            'id_profesor.integer' => 'El campo profesor debe ser un entero',
            'id_profesor.exists' => 'El registro no existe',
            'id_asignatura.integer' => 'El campo asignatura debe ser un entero',
            'id_asignatura.exists' => 'El registro no existe',
        ];
    }
}
