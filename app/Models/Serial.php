<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Episode;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Serial extends Model implements HasMedia
{

    use InteractsWithMedia;
    
    protected $fillable = [
        'name',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->family}";
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}
