<?php

namespace App\Http\Controllers;

use App\Http\Resources\CivilianPersonnelResource;
use App\Models\Civil_Vehicle_Registration;
use App\Models\Civilian_Personnel;
use App\Models\Military_Vehicle_Registration;
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

    public function getAllMilitaryVehicle()
    {
        $MilitaryVehicle = Military_Vehicle_Registration::all();

        return response()->json([
            'data' => $MilitaryVehicle,
        ])->setStatusCode(200);
    }
    public function addMilitaryVehicle(Request $request)
    {
        $vehicle = new Military_Vehicle_Registration();
        $vehicle->vehicle_id = $request->input('vehicle_id');
        $vehicle->color= $request->input('color');
        $vehicle->camp= $request->input('camp');
        $vehicle->military_personnel_id= $request->input('military_personnel_id');
        $vehicle->location_id= $request->input('location_id');
        $vehicle->vehicle_brand_id= $request->input('vehicle_brand_id');
        $vehicle->vehicle_type_id= $request->input('vehicle_type_id');
        $vehicle->save();

        return response()->json([
            'data' => [
                'id' => $vehicle->vehicle_id,
                'name' => $vehicle->color,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }

    public function addCivilVehicle(Request $request)
    {
        $CivilVehicle = new Civil_Vehicle_Registration();
        $CivilVehicle->vehicle_id = $request->input('vehicle_id');
        $CivilVehicle->color= $request->input('color');
        $CivilVehicle->observations= $request->input('observations');
        $CivilVehicle->civilian_personnel= $request->input('civilian_personnel');
        $CivilVehicle->location_id= $request->input('location_id');
        $CivilVehicle->vehicle_brand_id= $request->input('vehicle_brand_id');
        $CivilVehicle->vehicle_type_id= $request->input('vehicle_type_id');
        $CivilVehicle->save();

        return response()->json([
            'data' => [
                'id' => $CivilVehicle->vehicle_id,
                'name' => $CivilVehicle->color,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }
}
