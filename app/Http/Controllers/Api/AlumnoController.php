<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\AlumnoRequest;
use App\Mail\ChangePasswordMail;
use App\Models\Alumno;
use App\Models\Expediente;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class AlumnoController extends Controller
{
    protected $model = Alumno::class;
    protected $request = AlumnoRequest::class;

    public function alwaysIncludes(): array
    {
        return [
            'user',
            'expediente',
            'expediente.grado',
            'expediente.grado.seccion'
        ];
    }

    public function searchableBy(): array
    {
        return [
            'nombre',
            'apellido',
            'correo',
        ];
    }

    public function filterableBy(): array
    {
        return [
            'sexo',
        ];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with([
            'expediente' => function ($query) {
                $query->with([
                    'grado' => function ($query) {
                        $query->select('id', 'grado', 'id_seccion');
                        $query->with([
                            'seccion' => function ($query) {
                                $query->select('id', 'seccion');
                            }
                        ]);
                    }
                ]);
            },
            'user' => function ($query) {
                $query->select(['id', 'name', 'email']);
            }
        ]);

        return $query;
    }

    protected function beforeStore(Request $request, Model $entity)
    {
        $correo = $request->correo;
        if($correo){

            $newAlumno = User::create([
                'name' => $request->nombre,
                'email' => $correo,
                'password' => Hash::make('password123'),
            ]);

            $newAlumno->assignRole('alumno');

            $request->merge(['id_user' => $newAlumno->id]);

        }
    }

    protected function afterStore(Request $request, Model $entity){

        $email = $request->correo;
        $password_temporal = 'password123';
        $idAlumno = $entity->id;

        Expediente::create([
            'alumno_id' => $idAlumno,
            'grado_id' => $request->grado_id,
            'record_year' => $request->record_year
        ]);

        if($email){
            Mail::to($email)->send(new ChangePasswordMail($email, $password_temporal ));
        }



    }


}
