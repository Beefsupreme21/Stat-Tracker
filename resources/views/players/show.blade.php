<x-layout>
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
            <div class="grid grid-cols-1 gap-4 lg:col-span-3">
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="bg-white p-6">
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <div class="sm:flex sm:space-x-5">
                                <div class="flex-shrink-0">
                                    <img class="mx-auto h-20 w-20 rounded-full" src="{{ asset('images/default_profile.png' )}}" alt="Profile picture">
                                </div>
                                <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                    <h1 class="text-xl font-bold text-gray-900 sm:text-2xl">{{ $player->name }}</h1>
                                    @if ($player->teams->count() == 0)
                                        <p class="text-sm font-medium text-gray-600">This player isn't assigned to any teams</p>
                                    @else
                                        @foreach ($player->teams as $team) 
                                            <a href="/teams/{{ $team->id }}">
                                                <p class="text-sm font-medium text-gray-600">{{ $team->name }}</p>
                                            </a>
                                        @endforeach
                                    @endif
                                    <p class="text-sm font-medium text-gray-600">Joined on {{ date('M d, y', strtotime( $player->created_at )) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/players/{{ $player->id }}/edit">
                                <span class="text-gray-900">Edit Player Details</span>
                            </a>
                        </div>
                            <div class="px-6 py-5 text-center text-sm font-medium">
                            <a href="/players/{{ $player->id }}/teams">
                                <span class="text-gray-900">Edit Teams</span>
                            </a>
                        </div>
                        <div class="px-6 py-5 text-center text-sm font-medium">
                            <form method="POST" action="/players/{{ $player->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">
                                    Delete Player
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <x-career-stats :$player class="min-w-full divide-y divide-gray-300 rounded-lg" />
                <div class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <h2 class="text-xl font-semibold text-gray-900 mb-2">Recent Games</h2>
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-200">
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
                                    @foreach ($player->stats->sortByDesc('game.date') as $stat) 
                                        <tr>
                                            <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">{{ date('M d, y', strtotime( $stat->game->date )) }}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
