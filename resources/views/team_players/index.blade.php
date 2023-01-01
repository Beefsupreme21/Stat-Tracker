<x-layout>
    <div class="mx-auto mb-4 md:flex md:items-center md:justify-between md:w-4/5">
        <div class="min-w-0 flex-1">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 ml-3 sm:truncate sm:text-3xl sm:tracking-tight">{{ $team->name }} Players</h1>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <a href="/teams/{{ $team->id }}" class="ml-3 inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Back to teams page</a>
        </div>
    </div>

    <div class="grid grid-cols-1 mx-auto gap-4 md:w-4/5 lg:grid-cols-2 lg:gap-8">
        <div class="mt-8 overflow-x-hidden md:px-6 lg:px-8 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Players on {{ $team->name }}</h2>
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="flow-root">
                        <ul role="list" class="p-4">
                            @foreach ($team->players as $player)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="min-w-0 flex-1">
                                            <a href="/players/{{ $player->id }}">
                                                <p class="truncate text-sm font-medium text-gray-900">{{ $player->name }}</p>
                                            </a>
                                        </div>
                                        <div>
                                            <form method="POST" action="/teams/{{ $team->id }}/players/{{ $player->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="inline-flex items-center rounded-full border border-gray-300 bg-white px-2.5 py-0.5 text-sm font-medium leading-5 text-gray-700 shadow-sm hover:bg-gray-50">
                                                    Remove
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 overflow-x-hidden md:px-6 lg:px-8 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle">
                <h2 class="text-xl font-semibold text-gray-900 mb-2">Player Name</h2>
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <div class="flow-root">
                        <ul role="list" class="p-4">
                            @foreach ($players as $player)
                                <li class="py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="min-w-0 flex-1">
                                            <a href="/players/{{ $player->id }}">
                                                <p class="truncate text-sm font-medium text-gray-900">{{ $player->name }}</p>
                                            </a>
                                        </div>
                                        <div class="inline-flex items-center rounded-full border border-gray-300 bg-white px-2.5 py-0.5 text-sm font-medium leading-5 text-gray-700 shadow-sm hover:bg-gray-50">
                                            <form action="/teams/{{ $team->id }}/players" method="POST">
                                                @csrf
                                                <input type="hidden" name="player_id" value="{{ $player->id }}">
                                                <button type="submit">Add</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
