<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams =  Team::with('players')->get();

        return view('teams.index', compact('teams'));
    }

    public function create()
    {
        return view('teams.create');
    }

    public function store(Request $request)
    {
        $team = $request->validate([
            'name'=> 'required'
        ]);

        Team::create($team);
        return redirect('/teams');
    }

    public function show(Team $team)
    {
        $team->load(['seasons.games', 'players', 'stats.team:id,name', 'stats.player:id,name']);

        $playerCareerStats = $team->stats->groupBy('player_id');

        $stats = [];
        foreach ($playerCareerStats as $player) {
            $stats[] = (object) [
                'player' => $player[0]->player,
                'team' => $player[0]->team,
                'plate_attempts' => $player->sum('plate_attempts'),
                'at_bats' => $player->sum('at_bats'),
                'runs' => $player->sum('runs'),
                'hits' => $player->sum('hits'),
                'doubles' => $player->sum('doubles'),
                'triples' => $player->sum('triples'),
                'home_runs' => $player->sum('home_runs'),
                'runs_batted_in' => $player->sum('runs_batted_in'),
                'base_on_balls' => $player->sum('base_on_balls'),
                'strike_outs' => $player->sum('strike_outs'),
                'sacrifices' => $player->sum('sacrifices'),
                'home_run_outs' => $player->sum('home_run_outs'),
            ];
        }

        return view('teams.show', [
            'team' => $team,
            'stats' => $stats,
        ]);
    }

    public function edit(Team $team)
    {
        return view('teams.edit', [
            'team' => $team
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name'=> 'required'
        ]);

        $team->update($validated);
        return back();
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back();

    }
}
