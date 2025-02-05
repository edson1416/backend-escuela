<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class AsignaturaRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'nombre' => 'string|required|min:6|max:255',
            'descripcion' => 'string|required|min:6|max:255',
            'id_categoria_asignatura' => 'numeric|required|exists:categoria_asignaturas,id'
        ];
    }

    public function commonMessages(): array
    {
        return [
            'nombre.string' => 'El campo nombre debe ser alfanumérico',
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'El campo nombre debe tener un mínimo de 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'descripcion.string' => 'El campo nombre debe ser alfanumérico',
            'descripcion.required' => 'El campo descripcion es requerido',
            'descripcion.min' => 'El campo nombre debe tener un mínimo de 3 caracteres',
            'descripcion.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'id_categoria_asignatura.numeric' => 'El campo id_categoria_asignatura debe ser numérico',
            'id_categoria_asignatura.required' => 'El campo id_categoria_asignatura es requerido',
            'id_categoria_asignatura.exists' => 'La categoria_asignatura no existe'
        ];
    }
}
