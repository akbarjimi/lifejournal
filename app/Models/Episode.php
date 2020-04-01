<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Director;

class Episode extends Model
{
    protected $fillable = [
        'serial_id',
        'name',
        'season',
        'publisher_id',
    ];

    public function directors()
    {
        return $this->belongsToMany(Director::class);
    }
}
