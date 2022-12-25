<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'player_id',
        'team_id',
        'plate_attempts',
        'at_bats',
        'runs',
        'hits',
        'doubles',
        'triples',
        'home_runs',
        'runs_batted_in',
        'base_on_balls',
        'strike_outs',
        'sacrifices',
        'home_run_outs',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}