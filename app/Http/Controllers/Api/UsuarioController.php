<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function getUsuario(Request $request){
        $usuario = $request->user();
        $usuario->getRoleNames();
        return response()->json(['usuario' => $usuario]);
    }
}
