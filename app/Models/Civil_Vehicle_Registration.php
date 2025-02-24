<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Civil_Vehicle_Registration extends Model
{
    protected $table = 'civil_vehicle_registration';
    protected $fillable = [
        'vehicle_id',
        'color',
        'observations',
        'civilian_personnel_id',
        'location_id',
        'vehicle_brand_id',
        'vehicle_type_id',

    ];
}
