<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function index(Team $team) 
    {
        $players = Player::with('teams:id')->get();

        $players = $players->filter(function ($player) use ($team) {
            return !$player->teams->contains('id', $team->id);
        });

        $team = $team->load('players');

        return view('team_players.index', [
            'players' => $players,
            'team' => $team,
        ]);
    }

    public function store(Team $team)
    {  
        $team->players()->attach(request('player_id'));
        
        return back();
    }

    public function destroy(Team $team, Player $player)
    {
        $team->players()->detach($player);

        return back();
    }
}
