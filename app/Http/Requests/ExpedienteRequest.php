<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class ExpedienteRequest extends Request
{
   public function commonRules(): array
   {
       return [
           'alumno_id' => 'required|integer|exists:alumnos,id',
           'grado_id' => 'required|integer|exists:grados,id',
           'record_year' => 'required|integer|digits:4',
       ];
   }

   public function commonMessages(): array{
       return [
           'alumno_id.required' => 'El campo alumno_id es obligatorio',
           'alumno_id.integer' => 'El campo alumno_id debe ser un entero',
           'alumno_id.exists' => 'El alumno no existe',
           'grado_id.required' => 'El campo grado_id es obligatorio',
           'grado_id.integer' => 'El campo grado_id debe ser un entero',
           'grado_id.exists' => 'El grado no existe',
           'record_year.required' => 'El campo record_year es obligatorio',
           'record_year.integer' => 'El campo record_year debe ser un entero',
           'record_year.digits' => 'El campo record_year debe tener 4 digitos',
       ];
   }
}
