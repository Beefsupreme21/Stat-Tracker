<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;

class GameController extends Controller
{
    public function index()
    {
        $games =  Game::all();

        return view('games.index', [
            'games' => $games, 
        ]);
    }

    public function create()
    {
        $teams = Team::with('seasons')->get();

        return view('games.create', [
            'teams' => $teams,      
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_id'=> 'required',
            'season_id'=> 'required',
            'date'=> 'required',
            'location'=> 'nullable',
            'opponent'=> 'nullable',
            'weather'=> 'nullable',
            'umpire'=> 'nullable',
            'outcome'=> 'nullable',
        ]);

        Game::create($validated);

        return redirect('/stats/create?team_id='.$validated['team_id'].'&season_id='.$validated['season_id']);
    }

    public function show(Game $game)
    {
        $game->load('stats.player', 'stats.team');

        $game->stats = $game->stats->map(function ($stat) {
            return (object) [
                'player' => $stat->player,
                'team' => $stat->team,
                'games_played' => 1,
                'plate_attempts' => $stat->plate_attempts,
                'at_bats' => $stat->at_bats,
                'runs' => $stat->runs,
                'hits' => $stat->hits,
                'doubles' => $stat->doubles,
                'triples' => $stat->triples,
                'home_runs' => $stat->home_runs,
                'runs_batted_in' => $stat->runs_batted_in,
                'base_on_balls' => $stat->base_on_balls,
                'strike_outs' => $stat->strike_outs,
                'sacrifices' => $stat->sacrifices,
                'home_run_outs' => $stat->home_run_outs,
                'taken_bases' => ($stat->hits - $stat->doubles - $stat->triples - $stat->home_runs) + ($stat->doubles * 2) + ($stat->triples * 3) + ($stat->home_runs * 4),
            ];
        });

        return view('games.show', [
            'game' => $game
        ]);
    }

    public function edit(Game $game)
    {
        return view('games.edit', [
            'game' => $game
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $validated = $request->validate([
            'date'=> 'required',
            'location'=> 'nullable',
            'umpire'=> 'nullable',
            'weather'=> 'nullable',
            'opponent'=> 'nullable',
        ]);

        $game->update($validated);
        return redirect('/games');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return back();
    }
}
