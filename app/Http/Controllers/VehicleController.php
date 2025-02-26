<?php

namespace App\Http\Controllers;

use App\Http\Resources\CivilianPersonnelResource;
use App\Http\Resources\CivilVehicleResource;
use App\Http\Resources\MilitaryVehicleResource;
use App\Models\Civil_Vehicle_Registration;
use App\Models\Civilian_Personnel;
use App\Models\Location;
use App\Models\Military_personal;
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
        $MilitaryVehicle = Military_Vehicle_Registration::with(['location', 'vehicle_brand', 'vehicle_type', 'military_personnel'])->get()->toArray();

        return response()->json([
            'data' => $MilitaryVehicle,
        ], 200);
    }

    public function getAllCivilVehicle()
    {
        $MilitaryVehicle = Civil_Vehicle_Registration::with(['location', 'vehicle_brand', 'vehicle_type', 'civil_personnel'])->get()->toArray();

        return response()->json([
            'data' => $MilitaryVehicle,
        ], 200);
    }

    public function addMilitaryVehicle(Request $request)
    {
        $vehicle = new Military_Vehicle_Registration();
        $vehicle->vehicle_id = $request->input('vehicle_id');
        $vehicle->color= $request->input('color');
        $vehicle->camp= $request->input('camp');

        $vehicle->military_personnel()->associate(Military_personal::find($request->input('military_personnel')));
        $vehicle->location()->associate(Location::find($request->input('location')));
        $vehicle->vehicle_brand()->associate(Vehicle_Brand::find($request->input('vehicle_brand')));
        $vehicle->vehicle_type()->associate(Vehicle_Type::find($request->input('vehicle_type')));
        $vehicle->save();

        return (new MilitaryVehicleResource($vehicle))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Vehiculo agregado correctamente',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function addCivilVehicle(Request $request)
    {
        $CivilVehicle = new Civil_Vehicle_Registration();
        $CivilVehicle->vehicle_id = $request->input('vehicle_id');
        $CivilVehicle->color= $request->input('color');
        $CivilVehicle->observation= $request->input('observation');

        $CivilVehicle->civil_personnel()->associate(Civilian_Personnel::find($request->input('civil_personnel')));
        $CivilVehicle->location()->associate(Location::find($request->input('location')));
        $CivilVehicle->vehicle_brand()->associate(Vehicle_Brand::find($request->input('vehicle_brand')));
        $CivilVehicle->vehicle_type()->associate(Vehicle_Type::find($request->input('vehicle_type')));
        $CivilVehicle->save();

        return (new CivilVehicleResource($CivilVehicle))->additional([
            'msg'=>[
                'summary' => 'success',
                'detail' => 'Vehiculo agregado correctamente',
                'code' => '200'
            ]
        ])->response()->setStatusCode(200);
    }

    public function getAllMilitaryVehicles()
    {
        $vehicleBrand = Military_Vehicle_Registration::all();

        return response()->json([
            'data' => $vehicleBrand,
        ])->setStatusCode(200);
    }
    public function getAllVehicles()
    {
        $militaryVehicles = Military_Vehicle_Registration::with(['location', 'military_personnel', 'vehicle_brand', 'vehicle_type'])->get()->toArray();
        $civilVehicles = Civil_Vehicle_Registration::with(['location', 'civil_personnel', 'vehicle_brand', 'vehicle_type'])->get()->toArray();

        // Fusiona ambos arrays
        $allVehicles = array_merge($militaryVehicles, $civilVehicles);

        // Devuelve la respuesta con los vehículos
        return response()->json([
            'data' => $allVehicles,
            'msg' => [
                'summary' => 'Success',
                'detail' => 'All vehicles retrieved successfully',
                'code' => '200',
            ],
        ]);
    }


}
