<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ProfesorRequest;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class ProfesorController extends Controller
{
    protected $model = Profesor::class;
    protected $request = ProfesorRequest::class;

    public function alwaysIncludes(): array
    {
        return ['user', 'prefesorAsignatura','prefesorAsignatura.asignatura'];
    }

    public function filterableBy(): array
    {
        return ['prefesorAsignatura.id_asignatura'];
    }

    public function searchableBy(): array
    {
        return ['nombre','apellido','email'];
    }

    protected function beforeStore(Request $request, Model $entity)
    {
        $email = $request->email;
        if ($email) {
            $password = 'password123';

            $userProfesor = User::create([
                'name' => $request->nombre,
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $userProfesor->assignRole('profesor');

            $request->merge(['id_users' => $userProfesor->id]);
        }
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $query->with([
            'user' => function ($query) {
                $query->select('id', 'name', 'email');
            },
            'prefesorAsignatura' => function ($query) {
                $query->with(['asignatura' => function ($query) {
                    $query->select('id', 'nombre');
                }]);
            }
        ]);

        return $query;
    }

}
