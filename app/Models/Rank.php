<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'ranks';
    protected $fillable = [
        'name',
    ];
}
