<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Military_personal extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'militaries_personal';
    protected $fillable = [
        'cedula',
        'first_name',
        'last_name',
        'password',
        'unit_id',
        'rank_id'
    ];
}
