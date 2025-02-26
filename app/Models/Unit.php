<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable = [
        'name',
    ];

    public function Unit(){
        return $this->hasMany(Military_personal::class);
    }
}
