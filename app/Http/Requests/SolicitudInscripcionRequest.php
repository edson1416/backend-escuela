<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class SolicitudInscripcionRequest extends Request
{
   public function storeRules(): array
   {
       return [
           'nombre_alumno' => 'required|string|min:6|max:100',
           'apellido_alumno' => 'required|string|min:6|max:100',
           'fecha_nacimiento' => 'required|date',
           'sexo' => 'required|in:M,F',
           'correo_alumno' => 'required|email',
           'telefono_alumno' => 'string|min:6|max:20',
           'direccion_alumno' => 'required|string|min:6|max:255',
           'partida_nacimiento_archivo' => 'required|file|mimes:pdf,doc,docx',
           'foto_archivo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'nombre_responsable' => 'required|string|min:6|max:100',
           'telefono_responsable' => 'string|min:6|max:20',
           'correo_responsable' => 'required|email',
           'dui' => 'required|string|min:6|max:10', //06049466-7
           'certificado_archivo' => 'required|file|mimes:pdf,doc,docx',
           'constancia_archivo' => 'required|file|mimes:pdf,doc,docx',
           'id_grado' => 'required|integer|exists:grados,id'
       ];
   }

    public function storeMessages (): array{
       return [
           'nombre_alumno.required' => 'El campo nombre_alumno es obligatorio',
           'nombre_alumno.string' => 'El campo nombre_alumno tiene que ser alfanumerico',
           'nombre_alumno.min' => 'El campo nombre_alumno debe tener un minimo de :min caracteres',
           'nombre_alumno.max' => 'El campo nombre_alumno debe tener un maximo de :max caracteres',
           'apellido_alumno.required' => 'El campo apellido_alumno es obligatorio',
           'apellido_alumno.string' => 'El campo apellido_alumno tiene que ser alfanumerico',
           'apellido_alumno.min' => 'El campo apellido_alumno debe tener un minimo de :min caracteres',
           'apellido_alumno.max' => 'El campo apellido_alumno debe tener un maximo de :max caracteres',
           'fecha_nacimiento.required' => 'El campo fecha_nacimiento es obligatorio',
           'fecha_nacimiento.date' => 'El campo fecha_nacimiento debe ser una fecha',
           'sexo.required' => 'El campo sexo es obligatorio',
           'sexo.in' => 'El campo sexo debe tener un tipo de sexo',
           'correo_alumno.required' => 'El campo correo es obligatorio',
           'correo_alumno.email' => 'El campo correo debe tener un formato valido',
           'telefono_alumno.string' => 'El campo telefono_alumno debe ser alfanumerico',
           'telefono_alumno.min' => 'El campo telefono_alumno debe tener un minimo de :min caracteres',
           'telefono_alumno.max' => 'El campo telefono_alumno debe tener un maximo de :max caracteres',
           'direccion_alumno.required' => 'El campo direccion_alumno es obligatorio',
           'direccion_alumno.string' => 'El campo direccion_alumno debe ser alfanumerico',
           'direccion_alumno.min' => 'El campo direccion_alumno debe tener un minimo de :min caracteres',
           'direccion_alumno.max' => 'El campo de direccion_alumno debe tener un maximo de :max caracteres',
           'partida_nacimiento_archivo.required' => 'El campo partida_nacimiento_archivo es obligatorio',
           'partida_nacimiento_archivo.file' => 'El archivo debe tener formato .pdf, .doc o .docx ',
           'foto_archivo.required' => 'El campo foto_archivo es obligatorio',
           'foto_archivo.file' => 'El archivo debe tener formato .jpeg, .jpg , .png o svg',
           'foto_archivo.max' => 'El archivo debe tener un maximo de 2mb',
           'nombre_responsable.required' => 'El campo nombre_responsable es obligatorio',
           'nombre_responsable.string' => 'El campo nombre_responsable debe ser alfanumerico',
           'nombre_responsable.min' => 'El campo nombre_responsable debe tener un minimo de :min caracteres',
           'nombre_resposnable.max' => 'El campo nombre_responsable debe tener un maximo de :max caracteres',
           'telefono_responsable.string' => 'El campo telefono_responsable debe tener un numero',
           'correo_responsable.required' => 'El campo correo_responsable es obligatorio',
           'correo_responsable.email' => 'El campo correo debe tener un formato valido',
           'dui.required' => 'El campo dui es obligatorio',
           'dui.string' => 'El campo dui debe ser alfanumerico',
           'certificado_archivo.required' => 'El campo certificado_archivo es obligatorio',
           'certificado_archivo.file' => 'El archivo debe tener formato .pdf, .doc o .docx',
           'constancia_archivo.required' => 'El campo constancia_archivo es obligatorio',
           'constancia_archivo.file' => 'El campo constancia_archivo debe tener formato .pdf, .doc o .docx',
           'id_grado.required' => 'El campo id_grado es obligatorio',
           'id_grado.exists' => 'El grado seleccionado no existe',

       ];
   }
}
