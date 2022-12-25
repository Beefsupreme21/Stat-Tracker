<x-layout>
    <h1>Add Stats</h1>
    <div>
        <form action="/stats" method="POST">
            @csrf
            <div>
                <label>Game ID</label>
                <select name="game_id" class="border border-black bg-gray-800">
                    @foreach ($games as $game)
                        <option value="{{$game->id}}">{{$game->id}}</option>
                    @endforeach
                </select>                 
            </div>

                {{-- @foreach ($team->players as $player)
                    <div class="mt-2">
                    <a href="/players/{{ $player->name }}">
                        <button class="text-blue-500 hover:underline pr-3">
                            {{ $player->name }}
                        </button>
                    </a>
                    </div>
                @endforeach --}}

            <div>
                <label>Player ID</label>
                <select name="player_id" class="border border-black bg-gray-800">
                    @foreach ($players as $player)
                        <option value="{{$player->id}}">{{$player->name}}</option>
                    @endforeach
                </select>     
            </div>

            <div>
                <label>Team ID</label>
                <select name="team_id" class="border border-black bg-gray-800">
                    @foreach ($teams as $team)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endforeach
                </select>            
            </div>

            <div>
                <label>Plate Attempts</label>
                <input type="text" name="plate_attempts" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>At Bats</label>
                <input type="text" name="at_bats" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Runs</label>
                <input type="text" name="runs" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Hits</label>
                <input type="text" name="hits" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Doubles</label>
                <input type="text" name="doubles" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Triples</label>
                <input type="text" name="triples" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Home Runs</label>
                <input type="text" name="home_runs" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Runs Batted In</label>
                <input type="text" name="runs_batted_in" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Base on Balls</label>
                <input type="text" name="base_on_balls" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Strike Outs</label>
                <input type="text" name="strike_outs" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Sacrifices</label>
                <input type="text" name="sacrifices" class="border border-black bg-gray-800">
            </div>
            <div>
                <label>Home Run Outs</label>
                <input type="text" name="home_run_outs" class="border border-black bg-gray-800">
            </div>

            <input type="submit" value="Submit" class="border border-black bg-gray-500">

        </form> 
    </div>
</x-layout>