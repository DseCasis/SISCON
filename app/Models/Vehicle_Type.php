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
}
