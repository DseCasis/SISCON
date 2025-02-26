<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Civil_Vehicle_Registration extends Model
{
    protected $table = 'civil_vehicle_registration';
    protected $fillable = [
        'vehicle_id',
        'color',
        'observation',
        'civilian_personnel_id',
        'location_id',
        'vehicle_brand_id',
        'vehicle_type_id',

    ];

    public function civil_personnel(){
        return $this->belongsTo(Civilian_Personnel::class);
    }

    public function location(){
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function vehicle_brand(){
        return $this->belongsTo(Vehicle_Brand::class, 'vehicle_brand_id');
    }

    public function vehicle_type(){
        return $this->belongsTo(Vehicle_Type::class, 'vehicle_type_id');
    }
}
