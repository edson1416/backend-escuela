<?php

namespace App\Http\Requests;


use Orion\Http\Requests\Request;

class NotasAsignaturaRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'id_asignatura' => 'required|integer|exists:asignaturas,id',
            'id_periodo' => 'required|integer|exists:periodos,id',
            'id_expediente' => 'required|integer|exists:expedientes,id',
        ];
    }

    public function commonMessages(): array
    {
        return [
            'id_asignatura.required' => 'El campo asignatura es obligatorio.',
            'id_asignatura.integer' => 'El campo asignatura debe ser un entero.',
            'id_asignatura.exists' => 'El campo asignatura no existe.',
            'id_expediente.required' => 'El campo id_expediente es obligatorio.',
            'id_expediente.integer' => 'El campo id_expediente debe ser numerico.',
            'id_expediente.exists' => 'El campo id_expediente no existe.',
            'id_periodo.required' => 'El campo id_periodo es obligatorio.',
            'id_periodo.integer' => 'El campo id_periodo debe ser numerico.',
            'id_periodo.exists' => 'El campo id_periodo no existe.',
        ];
    }
}
