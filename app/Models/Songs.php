<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    protected $table = 'songs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'song_path', 'song_image_path', 'category_id'
    ];
}
