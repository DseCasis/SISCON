<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Brand extends Model
{
    protected $table = 'vehicle_brands';
    protected $fillable = [
        'name'
    ];

    public function vehicles_brand(){
        return $this->hasMany(Military_Vehicle_Registration::class, 'vehicle_brand_id');
    }

     public function civil_vehicles_brands(){
        return $this->hasMany(Civil_Vehicle_Registration::class);
    }


}
