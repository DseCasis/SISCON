<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Military_personal extends Model
{
    protected $table = 'militaries_personal';
    protected $fillable = [
        'cedula',
        'first_name',
        'last_name',
        'unit_id',
        'rank_id'
    ];
}
