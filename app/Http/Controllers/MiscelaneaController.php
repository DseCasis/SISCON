<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Rank;
use App\Models\Unit;
use Illuminate\Http\Request;

class MiscelaneaController extends Controller
{
    public function addUnit(Request $request)
    {
        $Unit = new Unit();
        $Unit->name = $request->input('name');
        $Unit->save();

        return response()->json([
            'data' => [
                'id' => $Unit->id,
                'name' => $Unit->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }

    public function getUnit()
    {
        $Unit = Unit::all();

        return response()->json([
            'data' => $Unit,
        ])->setStatusCode(200);
    }

    public function addRank(Request $request)
    {
        $Rank= new Rank();
        $Rank->name = $request->input('name');
        $Rank->save();

        return response()->json([
            'data' => [
                'id' => $Rank->id,
                'name' => $Rank->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }

    public function getRank()
    {
        $Rank = Unit::all();

        return response()->json([
            'data' => $Rank,
        ])->setStatusCode(200);
    }

    public function addLocation(Request $request)
    {
        $Location= new Location();
        $Location->name = $request->input('name');
        $Location->save();

        return response()->json([
            'data' => [
                'id' => $Location->id,
                'name' => $Location->name,
            ],
            'msg' => [
                'summary' => 'success',
                'detail' => 'La marca del vehículo ha sido agregada',
                'code' => '201'
            ]
        ], 201);
    }

    public function getLocation()
    {
        $Location = Unit::all();

        return response()->json([
            'data' => $Location,
        ])->setStatusCode(200);
    }
}
