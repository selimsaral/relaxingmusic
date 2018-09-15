<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'song_id', 'user_id'
    ];
}
