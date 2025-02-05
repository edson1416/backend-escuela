<?php

namespace App\Http\Requests;



use Orion\Http\Requests\Request;

class NotasAsignaturaRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'id_asignatura' => 'required|integer|exists:asignaturas,id',
            'periodo1' => 'numeric|nullable',
            'periodo2' => 'numeric|nullable',
            'periodo3' => 'numeric|nullable',
            'nota_final' => 'numeric|nullable',
            'id_expediente' => 'required|integer|exists:expedientes,id',
        ];
    }

    public function commonMessages(): array{
        return [
            'id_asignatura.required' => 'El campo asignatura es obligatorio.',
            'id_asignatura.integer' => 'El campo asignatura debe ser un entero.',
            'id_asignatura.exists' => 'El campo asignatura no existe.',
            'periodo1.numeric' => 'El campo periodo debe ser numerico.',
            'periodo2.numeric' => 'El campo periodo debe ser numerico.',
            'periodo3.numeric' => 'El campo periodo debe ser numerico.',
            'nota_final.numeric' => 'El campo nota debe ser numerico.',
            'id_expediente.required' => 'El campo id_expediente es obligatorio.',
            'id_expediente.integer' => 'El campo id_expediente debe ser numerico.',
            'id_expediente.exists' => 'El campo id_expediente no existe.',
        ];
    }
}
