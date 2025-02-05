<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\SolicitudInscripcionRequest;
use App\Mail\ChangePasswordMail;
use App\Mail\ChangeStatusRequestMail;
use App\Mail\SolicitudEnviadaMail;
use App\Models\Alumno;
use App\Models\Expediente;
use App\Models\SolicitudInscripcion;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class SolicitudInscripcionController extends Controller
{
    protected $model = SolicitudInscripcion::class;
    protected $request = SolicitudInscripcionRequest::class;

    protected function beforeStore(Request $request, Model $entity)
    {
        $partida_ruta = null;
        $foto_ruta = null;
        $certificado_ruta = null;
        $constancia_ruta = null;

        $partida_archivo = $request->file('partida_nacimiento_archivo');
        $foto_archivo = $request->file('foto_archivo');
        $certificado_archivo = $request->file('certificado_archivo');
        $constancia_archivo = $request->file('constancia_archivo');

        if ($partida_archivo) {
            $nombrePartida = Str::uuid() . '.' . $partida_archivo->getClientOriginalExtension();
            $partida_ruta = $partida_archivo->storeAs('public/partidas-nacimiento', $nombrePartida);
            $partida_ruta = str_replace('public/', '', $partida_ruta);
        }

        if ($foto_archivo) {
            $nombreFoto = Str::uuid() . '.' . $foto_archivo->getClientOriginalExtension();
            $foto_ruta = $foto_archivo->storeAs('public/fotos-alumnos', $nombreFoto);
            $foto_ruta = str_replace('public/', '', $foto_ruta);
        }

        if ($certificado_archivo) {
            $nombreCertificado = Str::uuid() . '.' . $certificado_archivo->getClientOriginalExtension();
            $certificado_ruta = $certificado_archivo->storeAs('public/certificados', $nombreCertificado);
            $certificado_ruta = str_replace('public', '', $certificado_ruta);
        }

        if ($constancia_archivo) {
            $nombreConstancia = Str::uuid() . '.' . $constancia_archivo->getClientOriginalExtension();
            $constancia_ruta = $constancia_archivo->storeAs('public/constancias', $nombreConstancia);
            $constancia_ruta = str_replace('public/', '', $constancia_ruta);
        }


        $request->merge([
            'partida_nacimiento' => $partida_ruta,
            'foto' => $foto_ruta,
            'certificado' => $certificado_ruta,
            'constancia_conducta' => $constancia_ruta,
            'id_estado' => 1
        ]);

    }

    protected function afterStore(Request $request, Model $entity)
    {
        $responsableEmail = $request->correo_responsable;
        $responsableNombre = $request->nombre_responsable;
        $alumnoNombre = $request->nombre_alumno . ' ' . $request->apellido_alumno;

        if ($responsableEmail) {
            Mail::to($responsableEmail)->send(new SolicitudEnviadaMail($responsableNombre, $alumnoNombre));
        }
    }

    protected function afterUpdate(Request $request, Model $entity)
    {
        /*
         * creacion usuario
         * */
        $correo = $request->correo_alumno;
        $correo_responsable = $request->correo_responsable;

        $newAlumno = User::create([
            'name' => $request->nombre_alumno.' '.$request->apellido_alumno,
            'email' => $correo,
            'password' => Hash::make('password123'),
        ]);

        $newAlumno->assignRole('alumno');

        /*
         * Creacion de registro Alumno
         * */

        $alumno = Alumno::create([
            'nombre' => $request->nombre_alumno,
            'apellido' => $request->apellido_alumno,
            'correo' => $request->correo_alumno,
            'telefono' => $request->get('telefono_alumno'),
            'direccion' => $request->get('direccion_alumno'),
            'fecha_nacimiento' => $request->get('fecha_nacimiento'),
            'sexo' => $request->get('sexo'),
            'id_user' => $newAlumno->id,
        ]);

        /*
         * Creacion Expediente
         * */
        $password_temporal = 'password123';
        $idAlumno = $alumno->id;

        Expediente::create([
            'alumno_id' => $idAlumno,
            'grado_id' => $request->id_grado,
            'record_year' => now()->year,
        ]);

        /*
         * Send Correo changePassword al Alumno y notificacion a Responsable
         * */

        if($correo){
            Mail::to($correo)->send(new ChangePasswordMail($correo, $password_temporal ));
        }

        if($correo_responsable){
            Mail::to($correo_responsable)->send(new ChangeStatusRequestMail(
                $request->get('nombre_responsable'),
                $alumno->nombre,
                $request->id_estado
            ));
        }

    }


}
