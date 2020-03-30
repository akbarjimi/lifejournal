<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = [
        'serial_id',
        'name',
        'director_id',
        'publisher_id',
    ];
}
