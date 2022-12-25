<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }
    
    
}
