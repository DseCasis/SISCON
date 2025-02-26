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

    public function military_personnel(){
        return $this->belongsTo(Military_personal::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function vehicle_brand(){
        return $this->belongsTo(Vehicle_Brand::class);
    }
    public function vehicle_type(){
        return $this->belongsTo(Vehicle_Type::class);
    }

}
