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

    public function store(Request $request, Team $team)
    {
        $game = $request->validate([
            'team_id'=> 'required',
            'season_id'=> 'required',
            'date'=> 'required',
            'location'=> 'required',
            'opponent'=> 'required',
            'weather'=> 'required',
            'umpire'=> 'required',
            'outcome'=> 'required',
        ]);

        Game::create($game);
        return redirect('/');

        return redirect('/stats/create')->with($team);

    }

    public function show(Game $game)
    {
        $game->load('stats.team', 'stats.player');

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
        $gameUpdated = $request->validate([
            'date'=> 'required',
            'location'=> 'required',
            'umpire'=> 'required',
            'weather'=> 'required',
            'opponent'=> 'required',
        ]);

        $game->update($gameUpdated);
        return redirect('/games');
    }

    public function destroy(Game $game)
    {
        $game->delete();
        return back();
    }
}
