<x-layout>
    <div class="text-center">
        <div class="text-4xl mb-8">
            {{ $team->name }}
        </div>
        <div>
            <a href="/teams/{{ $team->name }}/players">
                <button class="text-red-500 hover:underline pr-3">
                    View/Edit Roster
                </button>
            </a>
        </div>
        <a href="/teams/{{ $team->name }}/edit">
            <button class="text-red-500 hover:underline pr-3">
                Edit Team Name
            </button>
        </a>
    
        <form method="POST" action="/teams/{{ $team->name }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:underline">
                Delete Team
            </button>
        </form>
    </div>

    <div>
        <h2>Seasons</h2>
        <ul>
            @foreach ($team->seasons as $season)
                <li>
                    <a href="?season_id={{ $season->id }}">{{ $season->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="min-h-full">
        <div class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-cols-3">
            <div class="space-y-6 py-2 mt-8 md:px-6 lg:px-8 shadow sm:rounded-lg border border-black overflow-x-auto md:rounded-lg lg:col-span-3 ">
                <h2 class="text-lg font-medium text-gray-900">Total Stats</h2>
                <x-statlist :stats="$stats" />
            </div>
            <div class="lg:col-span-2">
                <div class="px-4 py-5 shadow sm:rounded-lg sm:px-6 border border-black">
                    <h2 class="text-lg font-medium text-gray-900">Recent Games</h2>
                    <a href="/games/create?team_id={{ $team->id }}">Add New Game</a>
                    <div class="py-2 mt-8 md:px-6 lg:px-8 shadow sm:rounded-lg overflow-x-auto md:rounded-lg lg:col-span-3 ">
                        @foreach ($team->seasons as $season)
                            <h4>{{ $season->year }} - {{ $season->name }}</h4>
                            <ul>
                                @foreach ($season->games as $game)
                                    <li class="border-b border-black flex justify-evenly text-lg py-4">
                                        <p>{{ date('M d, y', strtotime( $game->date )) }}</p>
                                        <p>{{ date('g:i a', strtotime( $game->date )) }}</p>
                                        <p>{{ $game->outcome }}</p>
                                        <p>{{ $game->opponent }}</p>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>    
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="px-4 py-5 shadow sm:rounded-lg sm:px-6 border border-black">
                <h2 class="text-lg font-medium text-gray-900">Roster</h2>
                    <a href="/teams/{{ $team->id }}/players">Add New Player</a>

                    <ul>
                        @foreach ($team->players as $player)
                            <li class="mt-2">
                                <a href="/players/{{ $player->id }}">{{ $player->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-layout>