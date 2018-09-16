<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'appuid', 'token', 'app_version', 'app_lang'
    ];


    public function scopeCheckToken($query, $token)
    {
        return $query->where('token' , $token)->where('token_expiry_date' , '>=' , Carbon::now());
    }
}
