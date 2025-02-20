<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Brand extends Model
{
    protected $table = 'vehicle_brands';
    protected $fillable = [
        'name'
    ];
}
