<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Episode;

class Director extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->middle_name} {$this->last_name}";
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
}
