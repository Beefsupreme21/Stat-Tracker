<x-layout>
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="bg-white p-6 mt-4 text-center sm:mt-0 sm:pt-1">
                        <h1 class="text-xl font-bold text-gray-900 sm:text-4xl">{{ $game->team->name }} vs 
                            @if ($game->team->opponent == '')
                                Opponent
                            @else
                                {{ $game->team->opponent }}
                            @endif
                        </h1>
                        <p class="text-lg text-gray-900">Played on {{ date('M d, y', strtotime( $game->date )) }} </p>
                    </div>
                    <div class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/games/{{ $game->id }}/edit">
                                <span class="text-gray-900">Edit Game</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/teams/{{ $game->team->id }}">
                                <span class="text-gray-900">View Team</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <form method="POST" action="/games/{{ $game->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Delete Game
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 gap-4">
            <div class="mt-8 -my-2 -mx-4 overflow-x-hidden sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">Details</h2>
                    </div>
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <div class="flow-root">
                            <ul role="list" class="p-4">
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Date</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->date }}</p>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Location</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->location }}</p>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Opponent</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->opponent }}</p>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Weather</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->weather }}</p>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Umpire</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->umpire }}</p>
                                    </div>
                                </li>
                                <li class="py-4">
                                    <div class="flex items-center justify-between space-x-4">
                                        <p class="truncate text-sm font-medium text-gray-900">Outcome</p>
                                        <p class="truncate text-sm font-medium text-gray-900">{{ $game->outcome }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            <div class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">Game Stats</h2>
                        <a href="/stats/create?game_id={{ $game->id }}&team_id={{ $game->team_id }}">Add new stat</a>
                    </div>
                    <div class="flex justify-between">
                        <div>{{ $game->date->format('n.j.y @ g:i a');  }}</div>
                        <div>{{ $game->location }}</div>
                        <div>{{ $game->opponent }}</div>
                    </div>
                    <x-stats.game :stats="$game->stats" />
                </div>
            </div>
        </div>
    </div>
</x-layout>
