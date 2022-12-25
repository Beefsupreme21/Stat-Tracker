<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerTeamController extends Controller
{
    public function index(Player $player) 
    {
        $teams = Team::with('players:id')->get();

        $teams = $teams->filter(function ($team) use ($player) {
            return !$team->players->contains('id', $player->id);
        });

        $player = $player->load('teams');

        return view('player_teams.index', [
            'teams' => $teams,
            'player' => $player,
        ]);
    }

    public function store(Player $player)
    {  
        $player->teams()->attach(request('team_id'));
        
        return back();
    }

    public function destroy(Player $player, Team $team)
    {
        $player->teams()->detach($team);

        return back();
    }
}
