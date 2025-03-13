<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\SolicitudInscripcionRequest;
use App\Mail\ChangePasswordMail;
use App\Mail\ChangeStatusRequestMail;
use App\Mail\SolicitudEnviadaMail;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Expediente;
use App\Models\Grado;
use App\Models\NotasAsignatura;
use App\Models\Periodo;
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

    public function alwaysIncludes(): array
    {
        return ['grado'];
    }

    public function filterableBy(): array
    {
        return [
            'id_grado',
            'sexo',
            'id_estado'
        ];
    }

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
            $partida_ruta = $partida_archivo->storeAs('partidas-nacimiento', $nombrePartida);
            //$partida_ruta = str_replace('public/', '', $partida_ruta);
        }

        if ($foto_archivo) {
            $nombreFoto = Str::uuid() . '.' . $foto_archivo->getClientOriginalExtension();
            $foto_ruta = $foto_archivo->storeAs('fotos-alumnos', $nombreFoto);
            //$foto_ruta = str_replace('public/', '', $foto_ruta);
        }

        if ($certificado_archivo) {
            $nombreCertificado = Str::uuid() . '.' . $certificado_archivo->getClientOriginalExtension();
            $certificado_ruta = $certificado_archivo->storeAs('certificados', $nombreCertificado);
            //$certificado_ruta = str_replace('public', '', $certificado_ruta);
        }

        if ($constancia_archivo) {
            $nombreConstancia = Str::uuid() . '.' . $constancia_archivo->getClientOriginalExtension();
            $constancia_ruta = $constancia_archivo->storeAs('constancias', $nombreConstancia);
            //$constancia_ruta = str_replace('public/', '', $constancia_ruta);
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
        $estadoSolicitud = $request->id_estado;

        /*
         * Validamos si la solicitud fue aprobada
         * */
        if ($estadoSolicitud == 2) {
            $newAlumno = User::create([
                'name' => $request->nombre_alumno . ' ' . $request->apellido_alumno,
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
            $idGrado = $request->id_grado;
            $expediente = Expediente::create([
                'alumno_id' => $idAlumno,
                'grado_id' => $idGrado,
                'record_year' => now()->year,
            ]);

            /*
             * Send Correo changePassword al Alumno
             * */

            if ($correo) {
                Mail::to($correo)->send(new ChangePasswordMail($correo, $password_temporal));
            }

            /*
             * Creacion de Notas-Asignatura-Periodos
             * */
            $asignaturas = [];
            $grado = Grado::find($idGrado);

            if ($grado->id_ciclo == 4) {
                $asignaturas = Asignatura::all()->pluck('id');
            } else {
                $asignaturas = Asignatura::where('id_categoria_asignatura', 1)->pluck('id');
            }

            $asignaturas->each(function ($asignatura) use ($expediente) {
                //Creacion periodo
                $periodo = Periodo::create([
                    "tarea1" => 0,
                    "tarea2" => 0,
                    "tarea3" => 0,
                    "examen" => 0,
                    "nota_final" => 0,
                    "numero_periodo" => 1
                ]);

                NotasAsignatura::create([
                    'id_asignatura' => $asignatura,
                    'id_periodo' => $periodo->id,
                    'id_expediente' => $expediente->id,
                ]);
            });
        }

        /*
         * Se envia correo al responsable
         * */
        if ($correo_responsable) {
            Mail::to($correo_responsable)->send(new ChangeStatusRequestMail(
                $request->get('nombre_responsable'),
                $request->nombre_alumno . ' ' . $request->apellido_alumno,
                $request->id_estado
            ));
        }

    }


}
