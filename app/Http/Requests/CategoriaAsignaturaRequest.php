<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class CategoriaAsignaturaRequest extends Request
{
    public function commonRules(): array{
        return [
            'nombre' => 'required|string|min:3|max:100',
            'descripcion' => 'string|min:3|max:100',
        ];
    }

    public function commonMessages(): array{
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.string' => 'El campo nombre debe ser de tipo texto',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener maximo 100 caracteres',
            'descripcion.string' => 'El campo descripcion debe ser de tipo texto',
            'descripcion.min' => 'El campo descripcion debe tener al menos 3 caracteres',
            'descripcion.max' => 'El campo descripcion debe tener maximo 100 caracteres',
        ];
    }
}
