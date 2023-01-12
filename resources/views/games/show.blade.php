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
                    <div class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-2 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/games/{{ $game->id }}/edit">
                                <span class="text-gray-900">Edit Game</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <form method="POST" action="/games/{{ $game->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Delete Team
                                </button>
                            </form>
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
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">Game Stats</h2>
                            <a href="/stats/create?game_id={{ $game->id }}&team_id={{ $game->team_id }}">Add new stat</a>
                        </div>
                        <x-statlist :stats="$game->stats" />
                        {{-- <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">                            
                            <table class="min-w-full">
                                <thead class="bg-gray-200 min-w-full divide-y divide-gray-300"> 
                                    <tr>
                                        <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Date</th>
                                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Team</th>
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
                                    @foreach ($game->stats as $stat)
                                        <tr>
                                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ $stat->player->name }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                                <a href="/teams/{{ $stat->team->id }}">{{ $stat->team->name }}</a>
                                            </td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $stat->at_bats }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->runs }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->hits }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->doubles }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->triples }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $stat->home_runs }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->runs_batted_in }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->base_on_balls }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->strike_outs }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->sacrifices }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">{{ $stat->home_run_outs }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                                            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
            </div>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
