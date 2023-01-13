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
        $team = Team::query()
            ->with(['players.stats' => function ($query) {
                $query->where('stats.game_id', request('game_id'));
            }])
            ->findOrFail(request('team_id'));

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
            'at_bats' => 'nullable',
            'runs' => 'nullable',
            'hits' => 'nullable',
            'doubles' => 'nullable',
            'triples' => 'nullable',
            'home_runs' => 'nullable',
            'runs_batted_in' => 'nullable',
            'base_on_balls' => 'nullable',
            'strike_outs' => 'nullable',
            'sacrifices' => 'nullable',
            'home_run_outs' => 'nullable',
        ]);

        Stat::create($validated);

        return redirect("/stats/create?game_id={$validated['game_id']}&team_id={$validated['team_id']}");
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
        $validated = $request->validate([
            'plate_attempts' => 'required',
            'at_bats' => 'nullable',
            'runs' => 'nullable',
            'hits' => 'nullable',
            'doubles' => 'nullable',
            'triples' => 'nullable',
            'home_runs' => 'nullable',
            'runs_batted_in' => 'nullable',
            'base_on_balls' => 'nullable',
            'strike_outs' => 'nullable',
            'sacrifices' => 'nullable',
            'home_run_outs' => 'nullable',
        ]);

        $stat->update($validated);

        return redirect('/stats');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back();
    }
}
