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

        return view('teams.show', [
            'team' => $team,
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
