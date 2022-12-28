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
            return redirect('/teams/'.request('team_id').'/players');
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
        $playerUpdated = $request->validate([
            'name'=> 'required'
        ]);

        $player->update($playerUpdated);
        return redirect('/players');
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return back();
    }




    public function test()
    {
        $players= Player::all();

        return view('test', [
            'players' => $players
        ]);
    }

    public function one()
    {
        $players= Player::all();

        $filtered = $players->filter(function($item) {
            return strlen($item['name']) > 7;
        });

        return $filtered;
    }

    public function two()
    {
        $players = Player::all();

        $plucked = $players->pluck('id');

        return $plucked;
    }

    public function three()
    {
        $players = Player::all();

        $contains = $players->contains( function($player) {
            return substr($player['name'], 0, 1) == 'A';
        });

        return $contains;
    }

    // Partition, like using filter but you also get a collection of the items that were filtered out
    public function four()
    {
        $players = Player::all();

        [$aboveFive, $underFive] = $players->partition(function($player) {
            return strlen($player['name']) > 5;
        });

        return $underFive;
    }

    // Chunk
    public function five()
    {
        $players = Player::all();

        $chunks = $players->chunk(4);

        return $chunks;
    }
}
