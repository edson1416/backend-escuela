<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * LOGIN DEL SISTEMA
     */
    public function login(): JsonResponse
    {

        //validancion de campos
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //buscamos usuario por email
        $usuario = User::where('email', request()->email)->first();

        //validamos usuarios y contraseña
        if (!$usuario || !Hash::check(request()->password, $usuario->password)) {
            throw ValidationException::withMessages([
                'credenciales' => ['Las credenciales proporcionadas son incorrectas']
            ]);
        }

        //validamos si el usuario no esta eliminado/desactivado
        throw_if(
            $usuario?->deleted_at !== null,
            AuthorizationException::class,
            'No tiene permiso para acceder a esta aplicación'
        );

        //retornamos un token de acceso
        return response()->json([
            'token' => $usuario->createToken('login',['*'], now()->addMinutes(24*60))->plainTextToken
        ]);
    }
}
