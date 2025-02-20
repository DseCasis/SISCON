<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_Type;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function getVehicleType()
    {
        $vehicleType = Vehicle_Type::all();

        return response()->json([
            'data' => $vehicleType,
        ])->setStatusCode(200);
    }

    public function addVehicleType(Request $request)
    {
        $vehicleType = new Vehicle_Type();
        $vehicleType->name = $request->input('name');
        $vehicleType->save();

        return response()->json([
            'data' => [
                'id' => $vehicleType->id,
                'name' => $vehicleType->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'El tipo de vehículo ha sido creado',
                'code' => '201'
            ]
        ], 201);
    }
}
