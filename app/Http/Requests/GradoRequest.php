<?php

namespace App\Http\Requests;



use Orion\Http\Requests\Request;

class GradoRequest extends Request
{
   public function commonRules(): array
   {
       return [
           'grado' => 'required|string|min:3|max:50',
           'id_seccion' => 'required|integer|exists:secciones,id',
           'id_ciclo' => 'required|integer|exists:ciclos,id',
       ];
   }

   public function commonMessages(): array
   {
       return [
           'grado.required' => 'El campo grado es obligatorio.',
           'grado.string' => 'El campo grado debe ser de tipo texto.',
           'grado.min' => 'El campo grado debe tener al menos :min caracteres.',
           'grado.max' => 'El campo grado debe tener un maximo de :max caracteres.',
           'id_seccion.required' => 'El campo id_seccion es obligatorio.',
           'id_seccion.integer' => 'El campo id_seccion debe ser de tipo numerico.',
           'id_seccion.exists' => 'El campo id_seccion no existe en la base de datos.',
           'id_ciclo.required' => 'El campo ciclo es obligatorio.',
           'id_ciclo.integer' => 'El campo ciclo debe ser de tipo numerico.',
           'id_ciclo.exists' => 'El campo ciclo no existe en la base de datos.',
       ];
   }
}
