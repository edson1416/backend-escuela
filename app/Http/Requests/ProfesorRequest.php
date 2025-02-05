<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class ProfesorRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'nombre' => 'string|required|min:6|max:255',
            'apellido' => 'string|required|min:6|max:255',
            'email' => 'email|required',
            'telefono' => 'string|required',
            'direccion' => 'string|max:255',
            'fecha_nacimiento' => 'date',

        ];
    }

    public function commonMessages(): array
    {
        return [
            'nombre.string' => 'El campo nombre debe ser alfanumérico',
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.min' => 'El campo nombre debe tener un mínimo de 3 caracteres',
            'nombre.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'apellido.string' => 'El campo nombre debe ser alfanumérico',
            'apellido.required' => 'El campo nombre es requerido',
            'apellido.min' => 'El campo nombre debe tener un mínimo de 3 caracteres',
            'apellido.max' => 'El campo nombre debe tener un máximo de 255 caracteres',
            'email.email' => 'El campo correo debe ser valido',
            'email.required' => 'El campo correo es requerido',
            'telefono.string'=> 'El campo telefono debe ser alfanumérico',
            'telefono.required' => 'El campo telefono es requerido',
            'direccion.string' => 'El campo direccion debe ser alfanumérico',
            'direccion.max' => 'El campo direccion debe tener un máximo de 255 caracteres',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha'
        ];
    }
}
