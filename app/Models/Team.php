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

    public function stats()
    {
        return $this->hasMany(Stat::class);
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function seasons()
    {
        return $this->belongsToMany(Season::class);
    }

    public function players()
    {
        return $this->belongsToMany(Player::class)
            ->orderBy('name');
    }
}
