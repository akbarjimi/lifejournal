<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
        'published_at',
        'publisher_id',
        'pages',
        'price',
    ];
}
