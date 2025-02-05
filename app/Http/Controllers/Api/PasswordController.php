<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'clave_actual' => ['required', 'string', 'min:6'],
            'clave_nueva' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(!Hash::check($request->clave_actual, Auth::user()->password)){
            return response()->json(['error' => ['clave_actual' => 'La clave actual no coincide. ']], 422);
        }

        $user = Auth::user();
        $user->password = Hash::make($request->clave_nueva);
        $user->save();

        return $request;
    }
}
