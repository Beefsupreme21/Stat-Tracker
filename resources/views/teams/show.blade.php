<x-layout>
    <div>
        <h1>{{ $team->name }}</h1>
    </div>
    <hr>
    <div>
        <h2>Stats</h2>
        <x-statlist :stats="$stats" />
    </div>
    {{-- <hr>
    <div>
        <h2>Seasons</h2>
        <ul>
            @foreach ($team->seasons as $season)
                <li>
                    <a href="?season_id={{ $season->id }}">{{ $season->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>  --}}   
    <hr>
    <div>
        <h3>Games</h3>
        @foreach ($team->seasons as $season)
            <h4>{{ $season->year }} - {{ $season->name }}</h4>
            <ul>
                @foreach ($season->games as $game)
                    <li>
                        <a href="/games/{{ $game->id }}">{{ $game->date }}</a>
                    </li>
                @endforeach
            </ul>
            <hr>    
        @endforeach
    </div>

    <div>
        <h2>Players</h2>
        <ul>
            @foreach ($team->players as $player)
                <li>
                    <a href="/player/{{ $player->id }}">{{ $player->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>   
</x-layout>