<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Importa esta clase
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Military_personal extends Authenticatable  implements JWTSubject
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

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function Unit(){
        return $this->belongsTo(Unit::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }

    public function military_personnel(){
        return $this->hasMany(Military_Vehicle_Registration::class);
    }

}
