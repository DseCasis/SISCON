<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_Type extends Model
{
    use HasFactory;
    protected $table = 'vehicles_types';
    protected $fillable = [
        'name'
    ];

    public function vehicles_type(){
        return $this->hasMany(Military_Vehicle_Registration::class);
    }
    public function civil_vehicles_types(){
        return $this->hasMany(Civil_Vehicle_Registration::class, 'vehicle_type_id');
    }
}
