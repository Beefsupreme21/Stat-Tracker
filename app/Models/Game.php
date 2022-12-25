<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'location',
        'umpire',
        'weather',
        'opponent',
    ];

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}