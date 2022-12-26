<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Stat;
use App\Models\Team;
use App\Models\Player;
use App\Models\PlayerTeam;
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
        $teams = Team::all();
        $players = Player::all();
        $games = Game::all();

        return view('stats.create', [
            'teams' => $teams, 
            'players' => $players, 
            'games' => $games, 
        ]);
    }

    public function store(Request $request)
    {
        $stat = $request->validate([
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

        $playerTeam = $request->only([
            'player_id',
            'team_id',
        ]);

        PlayerTeam::firstOrCreate($playerTeam);

        Stat::create($stat);

        return redirect('/stats');
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
