<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

}
