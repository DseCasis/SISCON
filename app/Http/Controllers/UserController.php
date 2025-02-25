<?php

namespace App\Http\Controllers;

use App\Http\Resources\CivilianPersonnelCollection;
use App\Http\Resources\CivilianPersonnelResource;
use App\Models\Civilian_Personnel;
use App\Models\Military_personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAllCivilianPersonnel()
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
    public function addCivilianPersonnel(Request $request)
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

    //personal militar

    public function getAllMilitaryPersonal(Request $request)
    {
        $MilitaryPersonal = Military_personal::all();

        $totalMilitaryPersonal = $MilitaryPersonal->count();

        return (new CivilianPersonnelCollection($MilitaryPersonal))->additional([
            'msg' => [
                'summary' => 'success',
                'detail' => 'Personal militar devuelto correctamente',
                'code' => '200'
            ],
            'totalMilitaryPersonal' => $totalMilitaryPersonal,
        ])->response()->setStatusCode(200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addMilitaryPersonal(Request $request)
    {
        $user = new Military_personal();
        $user->cedula = $request->input('cedula');
        $user->first_name= $request->input('first_name');
        $user->last_name= $request->input('last_name');
        $user->password= Hash::make ($request->input('cedula'));
        $user->unit_id= $request->input('unit_id');
        $user->rank_id= $request->input('rank_id');
        $user->save();

        return response()->json([
            'data' => [
                'id' => $user->id,
                'name' => $user->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'El personal militar se ha agregado de manera correcta',
                'code' => '201'
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function getMilitaryPersonal($id)
    {
        $user = Military_personal::find($id);

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
    public function updateMilitaryPersonal(Request $request, $id)
    {
        $user = Military_personal::find($id);
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
    public function destroyMilitaryPersonal($id)
    {
        $user = Military_personal::find($id);

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
