<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'name',
    ];

    public function location(){
        return $this->hasMany(Military_Vehicle_Registration::class);
    }

    public function civil_vehicles(){
        return $this->hasMany(Civil_Vehicle_Registration::class, 'location_id');
    }
}
