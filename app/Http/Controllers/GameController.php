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

        $game = Game::create($validated);

        return redirect('/stats/create?game_id=' . $game->id . '&team_id=' . $validated['team_id']);
    }

    public function show(Game $game)
    {
        $game->load('stats.player', 'team');

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
            'outcome'=> 'nullable',
        ]);

        $game->update($validated);

        return redirect('/games/' . $game->id);
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return back();
    }
}
