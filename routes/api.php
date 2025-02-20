<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('CivilianPersonnel',[\App\Http\Controllers\UserController::class, 'store']);
Route::post('addVehicleType',[\App\Http\Controllers\VehicleController::class, 'addVehicleType']);
Route::get('getVehicleType',[\App\Http\Controllers\VehicleController::class, 'getVehicleType']);
