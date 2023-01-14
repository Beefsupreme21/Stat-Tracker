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
            'seasons',
            'players:id,name',
            'players.stats' => function ($query) use ($team) {
                $query->where('team_id', $team->id);
            },
            'players.stats.game:id,season_id,date',
            'players.stats.game.season:id,name',
        ]);
        // $team->load([
        //     'seasons', 
        //     'players', 
        //     'stats.team:id,name', 
        //     'stats.player:id,name',
        //     'stats.game:id,season_id,date',
        //     'stats.game.season:id,name,year',
        // ]);

        // $playerStats = $team->stats->groupBy('player_id')->values();

        // $stats = [];
        // foreach ($playerStats as $stat) {
        //     $taken_bases = ($stat->sum('hits') - $stat->sum('doubles') - $stat->sum('triples') - $stat->sum('home_runs')) + ($stat->sum('doubles') * 2) + ($stat->sum('triples') * 3) + ($stat->sum('home_runs') * 4);
        //     $avg = (int) (($stat->sum('hits') / $stat->sum('at_bats')) * 1000);
        //     $obp = (int) ((($stat->sum('hits') + $stat->sum('base_on_balls')) / $stat->sum('plate_attempts')) * 1000);
        //     $slg = (int) (($taken_bases / $stat->sum('at_bats')) * 1000);
        //     $ops = (int) ((($stat->sum('hits') + $stat->sum('base_on_balls')) / $stat->sum('plate_attempts')) + ($taken_bases / $stat->sum('at_bats')) * 1000);

        //     $stats[] = (object) [
        //         'player' => $stat[0]->player,
        //         'team' => $stat[0]->team,
        //         'seasons' => $stat->pluck('game.season_id')->unique()->values(),
        //         'games_played' => $stat->count(),
        //         'plate_attempts' => $stat->sum('plate_attempts'),
        //         'at_bats' => $stat->sum('at_bats'),
        //         'runs' => $stat->sum('runs'),
        //         'hits' => $stat->sum('hits'),
        //         'doubles' => $stat->sum('doubles'),
        //         'triples' => $stat->sum('triples'),
        //         'home_runs' => $stat->sum('home_runs'),
        //         'runs_batted_in' => $stat->sum('runs_batted_in'),
        //         'base_on_balls' => $stat->sum('base_on_balls'),
        //         'strike_outs' => $stat->sum('strike_outs'),
        //         'sacrifices' => $stat->sum('sacrifices'),
        //         'home_run_outs' => $stat->sum('home_run_outs'),
        //         'taken_bases' =>  $taken_bases,
        //         'avg' => $avg,
        //         'obp' => $obp,
        //         'slg' => $slg,
        //         'ops' => $ops,
        //     ];
        // }

        return view('teams.show', [
            'team' => $team,
            // 'playerStats' => $playerStats,
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
