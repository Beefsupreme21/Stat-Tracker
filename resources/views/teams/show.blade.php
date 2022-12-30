<x-layout>
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="bg-white p-6 mt-4 text-center sm:mt-0 sm:pt-1">
                        <p class="text-xl font-bold text-gray-900 sm:text-4xl">{{ $team->name }}</p>
                    </div>
                    <div class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/teams/{{ $team->name }}/players">
                                <span class="text-gray-900">View/Edit Roster</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/teams/{{ $team->name }}/edit">
                                <span class="text-gray-900">Edit Team Name</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <form method="POST" action="/teams/{{ $team->name }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Delete Team
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <h1 class="text-xl font-semibold text-gray-900 mb-2">Total Stats</h1>
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Team</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">PA</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">AB</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">R</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">H</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">2B</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">3B</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">HR</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">RBI</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">BB</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">SO</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Sac</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">HRO</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">AVG</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">OBP</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">SLG</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">OPS</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($stats as $stat)
                                        <x-statitem :stat="$stat" :team="$stat->team" :player="$stat->player" />
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                <div class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">Recent Games</h2>
                            <a href="/games/create?team_id={{ $team->id }}">Add Game</a>
                        </div>
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                @foreach ($team->seasons as $season)
                                    <tr class="bg-gray-200">
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-sm font-semibold text-gray-900" colspan="5">{{ $season->year }} - {{ $season->name }}</th>
                                    </tr>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        @foreach ($season->games as $game)
                                            <tr>
                                                <td scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ date('M d, y', strtotime( $game->date )) }}</td>
                                                <td scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">{{ date('g:i a', strtotime( $game->date )) }}</td>
                                                <td scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">{{ $game->outcome }}</td>
                                                <td scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">{{ $game->opponent }}</td>
                                                <td scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    <a href="/games/{{ $game->id }}">View Game</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <div class="mt-8 -my-2 -mx-4 overflow-x-hidden sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <h1 class="text-xl font-semibold text-gray-900 mb-2">Roster</h1>
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <div class="flow-root">
                                <ul role="list" class="p-4">
                                    @foreach ($team->players as $player)
                                        <li class="py-4">
                                            <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <img class="h-8 w-8 rounded-full" src="{{ asset('images/default_profile.png' )}}" alt="">
                                            </div>
                                            <div class="min-w-0">
                                                <a href="/players/{{ $player->id }}" class="truncate text-sm font-medium text-gray-900">{{ $player->name }}</a>
                                            </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="min-w-0">
                                                <a href="/teams/{{ $team->id }}/players" class="truncate text-sm font-medium text-gray-900">Add New Player</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
