<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'datetime',
    ];

    protected $fillable = [
        'team_id',
        'season_id',
        'date',
        'location',
        'opponent',
        'weather',
        'umpire',
        'outcome',
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    public function stats()
    {
        return $this->hasMany(Stat::class)->oldest();
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

}