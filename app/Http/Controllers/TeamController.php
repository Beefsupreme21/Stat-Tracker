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
        $team->load('seasons.games', 'players', 'stats');

        return $careerStats = $team->stats->groupBy('player_id')->reduce();

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
