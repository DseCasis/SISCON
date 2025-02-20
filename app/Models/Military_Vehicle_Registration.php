<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Military_Vehicle_Registration extends Model
{
    protected $table = 'military_vehicle_registration';
    protected $fillable = [
        'vehicle_id',
        'color',
        'camp',
        'military_personnel_id',
        'location_id',
        'vehicle_brand_id',
        'vehicle_type_id',
    ];
}
