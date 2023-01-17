<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;

class TeamPlayerController extends Controller
{
    public function index(Team $team) 
    {
        $players = Player::query()
            ->with('teams:id')
            ->whereDoesntHave('teams', function ($query) use ($team) {
                $query->where('id', $team->id);
            })
            ->orderBy('name')
            ->get();

        $team = $team->load('players');

        return view('team_players.index', [
            'players' => $players,
            'team' => $team,
        ]);
    }

    public function store(Team $team)
    {
        $team->players()->attach(request('player_id'), ['role' => request('role')]);
        
        return back();
    }

    public function destroy(Team $team, Player $player)
    {
        $team->players()->detach($player);

        return back();
    }
}
