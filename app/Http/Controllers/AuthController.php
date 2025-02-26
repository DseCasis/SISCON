<?php

namespace App\Http\Controllers;

use App\Http\Resources\MilitaryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request){
        if(!Auth::attempt($request->only('cedula','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }
        $user = Auth::user();
        $token = $user->createToken('authToken')->plainTextToken;

        return (new MilitaryResource($user))->additional([
            'authToken'=>$token,
            'msg'=>[
                'summary' => 'Login success',
                'detail' => $token,
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            'message'=>'Success logout'
        ]);
    }

}
