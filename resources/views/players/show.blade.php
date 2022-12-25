<x-layout>
    <div class="flex flex-col lg:flex-row w-4/5 m-auto">
        <div class="border border-gray-600 h-min w-1/4 py-6 text-center mx-auto">
            <div class="mb-6 text-xl font-bold">{{ $player->name }}</div>
            <img src="{{asset('images/default_profile.png')}}" class="mx-auto w-52 mb-6" alt="">
            <div class="mb-6">        
                @if ($player->teams->count() == 0)
                    <p>This player isn't assigned to any teams</p>
                @else
                    <p class="text-lg font-bold">Teams</p>
                    <ul class="list-none">
                        @foreach ($player->teams as $team) 
                        <a href="/teams/{{ $team->name }}">
                            <li class="text-cyan-600 hover:underline">{{ $team->name }}</li>
                        </a>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="mb-6">        
                Joined on {{ date('M d, y', strtotime( $player->created_at )) }}
            </div>
            <div>
                <a href="/players/{{ $player->name }}/teams">
                    <button class="text-cyan-600 hover:underline">
                        Edit Teams
                    </button>
                </a>
            </div>
            <div class="mb-2">
                <a href="/players/{{ $player->name }}/edit">
                    <button class="text-cyan-600 hover:underline">
                        Edit Player Details
                    </button>
                </a>
            </div>
            <form method="POST" action="/players/{{ $player->name }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">
                    Delete Player
                </button>
            </form>
        </div>

        <div>
            <div class="text-center border-x border-t border-gray-600 p-4">
                <span>Recent Games</span>
            </div>

            <table>
                <thead> 
                    <tr class="border border-gray-600 border-collapse text-left">
                        <th x-on:click="sort('date')" class="p-4 border-r border-gray-600 cursor-pointer">Date</th>
                        <th class="p-4 border-r border-gray-600">Team</th>
                        <th class="p-4 border-r border-gray-600">At Bats</th>
                        <th class="p-4 border-r border-gray-600">Runs</th>
                        <th class="p-4 border-r border-gray-600">Hits</th>
                        <th class="p-4 border-r border-gray-600">Doubles</th>
                        <th class="p-4 border-r border-gray-600">Triples</th>
                        <th class="p-4 border-r border-gray-600">Home Runs</th>
                        <th class="p-4 border-r border-gray-600">Runs Batted In</th>
                        <th class="p-4 border-r border-gray-600">AVG</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($player->stats as $stat) 
                    <tr class="border border-gray-600 border-collapse text-left">
                        <td class="p-4 border-r border-gray-600">{{ date('M d, y', strtotime( $stat->game->date )) }}</td>
                        <td class="p-4 border-r border-gray-600">
                            <a href="/teams/{{ $stat->team->name }}">
                                <button class="text-cyan-600 hover:underline">
                                    {{ $stat->team->name }}
                                </button>
                            </a>
                        </td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->at_bats }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->runs }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->hits }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->doubles }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->triples }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->home_runs }}</td>
                        <td class="p-4 border-r border-gray-600">{{ $stat->runs_batted_in }}</td>
                        <td class="p-4 border-r border-gray-600">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

</x-layout>
