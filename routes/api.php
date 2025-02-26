<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MiscelaneaController;
use App\Http\Controllers\UserController;

// Rutas públicas (sin autenticación)
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);

// Rutas protegidas por el middleware de autenticación (requieren token JWT)
Route::middleware(['auth:api'])->group(function () {
    // Rutas relacionadas con vehículos
    Route::post('addVehicleType', [\App\Http\Controllers\VehicleController::class, 'addVehicleType']);
    Route::get('getVehicleType', [\App\Http\Controllers\VehicleController::class, 'getVehicleType']);
    Route::post('addVehicleBrand', [\App\Http\Controllers\VehicleController::class, 'addVehicleBrand']);
    Route::get('getVehicleBrand', [\App\Http\Controllers\VehicleController::class, 'getVehicleBrand']);
    Route::post('addMilitaryVehicle', [\App\Http\Controllers\VehicleController::class, 'addMilitaryVehicle']);
    Route::get('getAllMilitaryVehicle', [\App\Http\Controllers\VehicleController::class, 'getAllMilitaryVehicle']);
    Route::post('addCivilVehicle', [\App\Http\Controllers\VehicleController::class, 'addCivilVehicle']);
    Route::get('getAllCivilVehicle', [\App\Http\Controllers\VehicleController::class, 'getAllCivilVehicle']);
    Route::get('getAllVehicles', [\App\Http\Controllers\VehicleController::class, 'getAllVehicles']);

    // Rutas relacionadas con unidades y rangos
    Route::post('addUnit', [\App\Http\Controllers\MiscelaneaController::class, 'addUnit']);
    Route::get('getUnit', [\App\Http\Controllers\MiscelaneaController::class, 'getUnit']);
    Route::post('addRank', [\App\Http\Controllers\MiscelaneaController::class, 'addRank']);
    Route::get('getRank', [\App\Http\Controllers\MiscelaneaController::class, 'getRank']);
    Route::get('getLocation', [\App\Http\Controllers\MiscelaneaController::class, 'getLocation']);

    // Rutas relacionadas con personal militar y civil
    Route::get('getAllCivilianPersonnel', [\App\Http\Controllers\UserController::class, 'getAllCivilianPersonnel']);
    Route::post('addCivilianPersonnel', [\App\Http\Controllers\UserController::class, 'addCivilianPersonnel']);
    Route::post('addMilitaryPersonal', [\App\Http\Controllers\UserController::class, 'addMilitaryPersonal']);
    Route::get('getAllMilitaryPersonal', [\App\Http\Controllers\UserController::class, 'getAllMilitaryPersonal']);
});
