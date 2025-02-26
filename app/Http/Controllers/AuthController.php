<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\MilitaryResource;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validación de las credenciales
        $credentials = $request->only('cedula', 'password');

        // Intentar autenticar al usuario
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials!',
            ], 401);
        }

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Retornar la respuesta con los datos del usuario y el token JWT
        return (new MilitaryResource($user))->additional([
            'authToken' => $token,
            'msg' => [
                'summary' => 'Login success',
                'detail' => $token,
                'code' => '200',
            ]
        ])->response()->setStatusCode(200);
    }

    public function logout()
    {
        try {
            // Invalidar el token actual
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json(['message' => 'Successfully logged out'], 200);
        } catch (JWTException $e) {
            return response()->json(['message' => 'Failed to log out, please try again'], 500);
        }
    }
}
