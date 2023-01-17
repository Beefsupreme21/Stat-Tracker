<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class)
            ->withPivot('role')
            ->orderBy('player_team.role')
            ->orderBy('name');
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class)->latest();
    }

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }
}
