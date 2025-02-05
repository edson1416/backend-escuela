<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class AlumnoRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:255',
            'apellido' => 'required|string|min:3|max:255',
            'correo' => 'required|email|unique:alumnos,correo',
            'telefono' => 'string|min:8|max:255',
            'direccion' => 'required|string|min:3|max:255',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required|in:M,F',
            //'grado_actual' => 'required|integer|exists:grados,id'
        ];
    }

    public function commonMessages(): array{
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El campo nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El campo nombre no puede tener mas de 255 caracteres',
            'nombre.string' => 'El campo nombre debe ser alfanumerico',
            'apellido.required' => 'El campo apellido es obligatorio',
            'apellido.string' => 'El campo apellido debe ser alfanumerico',
            'apellido.min' => 'El campo apellido debe tener al menos 3 caracteres',
            'apellido.max' => 'El campo apellido debe tener mas de 255 caracteres',
            'correo.required' => 'El campo correo es obligatorio',
            'correo.email' => 'El campo correo no tien el formato correcto',
            'correo.unique' => 'El correo ya esta registrado',
            'telefono.string' => 'El campo telefono debe ser alfanumerico',
            'telefono.min' => 'El campo telefono debe tener al menos 8 caracteres',
            'telefono.max' => 'El campo telefono debe tener mas de 255 caracteres',
            'direccion.required' => 'El campo direccion es obligatorio',
            'direccion.string' => 'El campo direccion debe ser alfanumerico',
            'direccion.min' => 'El campo direccion debe tener al menos 3 caracteres',
            'direccion.max' => 'El campo direccion debe tener mas de 255 caracteres',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha',
            'sexo.required' => 'El campo sexo es obligatorio',
            'sexo.in' => 'El campo sexo debe ser alfanumerico',
//            'grado_actual.required' => 'El campo grado actual es obligatorio',
//            'grado_actual.integer' => 'El campo grado debe ser numerico',
//            'grado_actual.exists' => 'El grado no existe'
        ];
    }
}
