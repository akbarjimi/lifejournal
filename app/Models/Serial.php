<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Episode;

class Serial extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->family}";
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
