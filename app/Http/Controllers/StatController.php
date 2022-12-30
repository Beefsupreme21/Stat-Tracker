<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Stat;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStatRequest;
use App\Http\Requests\UpdateStatRequest;
use Illuminate\Validation\Rules\Exists;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::with('player', 'team')->get();

        return view('stats.index', [
            'stats' => $stats, 
        ]);
    }

    public function create()
    {
        $team = Team::with('players')->find(request('team_id'));
        
        if (!$team) {
            return back();
        }

        return view('stats.create', [
            'team' => $team
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_id' => 'required',
            'player_id' => 'required',
            'team_id' => 'required',
            'plate_attempts' => 'required',
            'at_bats' => 'required',
            'runs' => 'required',
            'hits' => 'required',
            'doubles' => 'required',
            'triples' => 'required',
            'home_runs' => 'required',
            'runs_batted_in' => 'required',
            'base_on_balls' => 'required',
            'strike_outs' => 'required',
            'sacrifices' => 'required',
            'home_run_outs' => 'required',
        ]);

        Stat::create($validated);

        return redirect("/games/{$validated['game_id']}");
    }

    public function show(Stat $stat)
    {
        return view('stats.show', [
            'stat' => $stat
        ]);
    }

    public function edit(Stat $stat)
    {
        return view('stats.edit', [
            'stat' => $stat
        ]);
    }

    public function update(Request $request, Stat $stat)
    {
        $statUpdated = $request->validate([
            'plate_attempts' => 'required',
            'at_bats' => 'required',
            'runs' => 'required',
            'hits' => 'required',
            'doubles' => 'required',
            'triples' => 'required',
            'home_runs' => 'required',
            'runs_batted_in' => 'required',
            'base_on_balls' => 'required',
            'strike_outs' => 'required',
            'sacrifices' => 'required',
            'home_run_outs' => 'required',
        ]);

        $stat->update($statUpdated);
        return redirect('/stats');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back();
    }
}
