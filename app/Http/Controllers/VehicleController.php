<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_Brand;
use App\Models\Vehicle_Type;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

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

    public function getVehicleType()
    {
        $vehicleType = Vehicle_Type::all();

        return response()->json([
            'data' => $vehicleType,
        ])->setStatusCode(200);
    }

    public function addVehicleBrand(Request $request)
    {
        $vehicleBrand = new Vehicle_Brand();
        $vehicleBrand->name = $request->input('name');
        $vehicleBrand->save();

        return response()->json([
            'data' => [
                'id' => $vehicleBrand->id,
                'name' => $vehicleBrand->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }

    public function getVehicleBrand()
    {
        $vehicleBrand = Vehicle_Brand::all();

        return response()->json([
            'data' => $vehicleBrand,
        ])->setStatusCode(200);
    }


}
