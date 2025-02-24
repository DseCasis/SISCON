<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('CivilianPersonnel',[\App\Http\Controllers\UserController::class, 'store']);

Route::post('addVehicleType',[\App\Http\Controllers\VehicleController::class, 'addVehicleType']);
Route::get('getVehicleType',[\App\Http\Controllers\VehicleController::class, 'getVehicleType']);

Route::post('addVehicleBrand',[\App\Http\Controllers\VehicleController::class, 'addVehicleBrand']);
Route::get('getVehicleBrand',[\App\Http\Controllers\VehicleController::class, 'getVehicleBrand']);

Route::post('addUnit',[\App\Http\Controllers\MiscelaneaController::class, 'addUnit']);
Route::get('getUnit',[\App\Http\Controllers\MiscelaneaController::class, 'getUnit']);

Route::post('addRank',[\App\Http\Controllers\MiscelaneaController::class, 'addRank']);
Route::get('getRank',[\App\Http\Controllers\MiscelaneaController::class, 'getRank']);

Route::get('getAllCivilianPersonnel',[\App\Http\Controllers\UserController::class, 'getAllCivilianPersonnel']);
Route::post('addCivilianPersonnel',[\App\Http\Controllers\UserController::class, 'addCivilianPersonnel']);

Route::post('addMilitaryPersonal',[\App\Http\Controllers\UserController::class, 'addMilitaryPersonal']);
Route::get('getAllMilitaryPersonal',[\App\Http\Controllers\UserController::class, 'getAllMilitaryPersonal']);

Route::post('addMilitaryVehicle',[\App\Http\Controllers\VehicleController::class, 'addMilitaryVehicle']);
Route::get('getAllMilitaryVehicle',[\App\Http\Controllers\VehicleController::class, 'getAllMilitaryVehicle']);

Route::post('addCivilVehicle',[\App\Http\Controllers\VehicleController::class, 'addCivilVehicle']);
Route::get('getRank',[\App\Http\Controllers\MiscelaneaController::class, 'getRank']);
