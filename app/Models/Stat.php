<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    use HasFactory;

    protected $appends = [
        'avg',
        'obp',
        'slg',
        'ops',
        'iso',
        'rc',
        'babip',
        'taken_bases',
    ];

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

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function getAvgAttribute()
    {
        return $this->at_bats 
            ? number_format($this->hits / $this->at_bats, 3)
            : '0.000';
    }

    public function getBabipAttribute()
    {
        return ($this->at_bats - $this->strike_outs - $this->home_runs - $this->home_run_outs + $this->sacrifices)
            ? number_format(($this->hits - $this->home_runs) / ($this->at_bats - $this->strike_outs - $this->home_runs - $this->home_run_outs + $this->sacrifices), 3)
            : '0.000';
    }

    public function getIsoAttribute()
    {
        return number_format($this->slg - $this->avg, 3);
    }

    public function getObpAttribute()
    {
        return number_format(($this->hits + $this->base_on_balls) / $this->plate_attempts, 3);
    }

    public function getOpsAttribute()
    {
        return $this->at_bats 
            ? number_format(($this->hits + $this->base_on_balls) / $this->plate_attempts + ($this->taken_bases / $this->at_bats), 3)
            : number_format(($this->hits + $this->base_on_balls) / $this->plate_attempts, 3);
    }

    public function getRcAttribute()
    {
        return number_format(($this->hits + $this->base_on_balls) * $this->taken_bases / ($this->at_bats + $this->base_on_balls), 1);
    }
    
    public function getSlgAttribute()
    {
        return $this->at_bats 
            ? number_format($this->taken_bases / $this->at_bats, 3)
            : '0.000';
    }

    public function getTakenBasesAttribute()
    {
        return ($this->hits - $this->doubles - $this->triples - $this->home_runs) 
            + ($this->doubles * 2) 
            + ($this->triples * 3) 
            + ($this->home_runs * 4);
    }
}