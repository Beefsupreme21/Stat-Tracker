<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams =  Team::with('players')->get();

        return view('teams.index', [
            'teams' => $teams, 
        ]);
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
        $team->load([
            'seasons.games' => function ($query) use ($team) {
                $query->where('team_id', $team->id);
            }, 
            'players', 
            'stats.team:id,name', 
            'stats.player:id,name'
        ]);

        $playerCareerStats = $team->stats->groupBy('player_id');

        $stats = [];
        foreach ($playerCareerStats as $game) {
            $stats[] = (object) [
                'player' => $game[0]->player,
                'team' => $game[0]->team,
                'games_played' => $game->count(),
                'plate_attempts' => $game->sum('plate_attempts'),
                'at_bats' => $game->sum('at_bats'),
                'runs' => $game->sum('runs'),
                'hits' => $game->sum('hits'),
                'doubles' => $game->sum('doubles'),
                'triples' => $game->sum('triples'),
                'home_runs' => $game->sum('home_runs'),
                'runs_batted_in' => $game->sum('runs_batted_in'),
                'base_on_balls' => $game->sum('base_on_balls'),
                'strike_outs' => $game->sum('strike_outs'),
                'sacrifices' => $game->sum('sacrifices'),
                'home_run_outs' => $game->sum('home_run_outs'),
                'taken_bases' => ($game->sum('hits') - $game->sum('doubles') - $game->sum('triples') - $game->sum('home_runs')) + ($game->sum('doubles') * 2) + ($game->sum('triples') * 3) + ($game->sum('home_runs') * 4),
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
