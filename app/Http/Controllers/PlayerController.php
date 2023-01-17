<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index()
    {   
        $players = Player::when(request('search'), function ($query) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        })->with('teams')->get();

        return view('players.index', [
            'players' => $players->sortBy('name'), 
        ]);
    }

    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {   
        $validated = $request->validate([
            'name'=> 'required'
        ]);

        Player::create($validated);

        if (request('team_id')) {
            return redirect('/teams/' . request('team_id') . '/players');
        }

        return redirect('/players');
    }

    public function show(Player $player)
    {
        return view('players.show', [
            'player' => $player
        ]);
    }


    public function edit(Player $player)
    {
        return view('players.edit', [
            'player' => $player
        ]);
    }

    public function update(Request $request, Player $player)
    {
        $validated = $request->validate([
            'name'=> 'required'
        ]);

        $player->update($validated);
        return redirect('/players'.'/'.$player->id);
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return back();
    }
}
