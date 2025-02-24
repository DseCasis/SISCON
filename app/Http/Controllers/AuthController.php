<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request){
        if(!Auth::attempt($request->only('CI','password'))){
            return response([
                'message'=>'invalid credentials!'
            ], 404);
        }
        $user =Auth:::user();
        $token = $user->createToken('token')->plainTextToken;

        return (new UserResource($user))->additional([
            'token'=>$token,
            'msg'=>[
                'summary' => 'Login success',
                'detail' => '',
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
