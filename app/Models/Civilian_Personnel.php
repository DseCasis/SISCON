<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Civilian_Personnel extends Model
{
    protected $table = 'civilian_personnel';
    protected $fillable = [
      'cedula',
      'first_name',
      'last_name',
    ];

    public function civil_personnel(){
        return $this->hasMany(Civil_Vehicle_Registration::class);
    }

}
