<?php

namespace App\Http\Controllers;

use App\Http\Resources\CivilianPersonnelCollection;
use App\Http\Resources\CivilianPersonnelResource;
use App\Models\Civilian_Personnel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $civilianPersonnel = Civilian_Personnel::all();

        $totalCivilianPersonnel = $civilianPersonnel->count();

        return (new CivilianPersonnelCollection($civilianPersonnel))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => 'Personal civil devuelto correctamente',
                'code' => '200'
            ],
            'totalCivilianPersonnel' => $totalCivilianPersonnel,
        ])->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new Civilian_Personnel();
        $user->cedula = $request->input('cedula');
        $user->first_name= $request->input('first_name');
        $user->last_name= $request->input('last_name');
        $user->save();

        return (new CivilianPersonnelResource($user))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'El usuario a sido creado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = Civilian_Personnel::find($id);

        if (!$user) {
            return response()->json([
                'msg' => [
                    'summary' => 'Not Found',
                    'detail' => 'El usuario no existe',
                    'code' => '404'
                ]
            ], 404);
        }

        return (new CivilianPersonnelResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => 'Usuario encontrado',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = Civilian_Personnel::find($id);
        if (!$user) {
            return response()->json([
                'msg' => [
                    'summary' => 'Not Found',
                    'detail' => 'El usuario no existe',
                    'code' => '404'
                ]
            ], 404);
        }

        $user->cedula = $request->input('cedula', $user->cedula); // Si no se proporciona, mantiene el valor actual
        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);

        // Guarda los cambios en la base de datos
        $user->save();

        // Devuelve el recurso actualizado con un mensaje adicional
        return (new CivilianPersonnelResource($user))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => 'Usuario actualizado correctamente',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Civilian_Personnel::find($id);

        if (!$user) {
            return response()->json([
                'msg' => [
                    'summary' => 'Not Found',
                    'detail' => 'El usuario no existe',
                    'code' => '404'
                ]
            ], 404);
        }

        $user->delete();

        return response()->json([
            'msg' => [
                'summary' => 'success',
                'detail' => 'Usuario eliminado correctamente',
                'code' => '200'
            ]
        ], 200);
    }
}
