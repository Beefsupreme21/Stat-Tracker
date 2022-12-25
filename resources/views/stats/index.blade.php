<x-layout>
    <div class="text-center mb-8">
        <p class="text-4xl">Stats</p> 
        <a href="/stats/create"><p class="pt-3 hover:underline hover:font-bold "> Add Stats</p></a>
    </div>

    <table class="table-auto w-4/5 m-auto">
        <thead> 
            <tr class="border-b border-gray-600 border-collapse text-left">
                <th class="px-4">Game</th>
                <th class="px-4">Player</th>
                <th class="px-4">Team</th>
                <th class="px-4">PA</th>
                <th class="px-4">AB</th>
                <th class="px-4">R</th>
                <th class="px-4">H</th>
                <th class="px-4">2B</th>
                <th class="px-4">3B</th>
                <th class="px-4">HR</th>
                <th class="px-4">RBI</th>
                <th class="px-4">BB</th>
                <th class="px-4">SO</th>
                <th class="px-4">Sac</th>
                <th class="px-4">HRO</th>
                <th class="px-4">AVG</th>
                <th class="px-4">OBP</th>
                <th class="px-4">SLG</th>
                <th class="px-4">OPS</th>
            </tr>
        </thead>

        @foreach ($stats as $stat)

        <tbody>
            <tr>
                <td class="px-4 py-3 text-blue-500 hover:underline">       
                    <a href="/stats/{{ $stat->id }}">
                        <p>Game {{ $stat->id }}</p>
                    </a>
                </td>
                <td class="px-4 py-3">{{ $stat->player->name }}</td>
                <td class="px-4 py-3 border-r border-gray-600">{{ $stat->team->name }}</td>
                <td class="px-4 py-3">{{ $stat->plate_attempts }}</td>
                <td class="px-4 py-3 border-r border-gray-600">{{ $stat->at_bats }}</td>
                <td class="px-4 py-3">{{ $stat->runs }}</td>
                <td class="px-4 py-3">{{ $stat->hits }}</td>
                <td class="px-4 py-3">{{ $stat->doubles }}</td>
                <td class="px-4 py-3">{{ $stat->triples }}</td>
                <td class="px-4 py-3">{{ $stat->home_runs }}</td>
                <td class="px-4 py-3 border-r border-gray-600">{{ $stat->runs_batted_in }}</td>
                <td class="px-4 py-3">{{ $stat->base_on_balls }}</td>
                <td class="px-4 py-3 border-r border-gray-600">{{ $stat->strike_outs }}</td>
                <td class="px-4 py-3">{{ $stat->sacrifices }}</td>
                <td class="px-4 py-3 border-r border-gray-600">{{ $stat->home_run_outs }}</td>
                <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                <td class="px-4 py-3">{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
                <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
            </tr>
        </tbody>
            
        @endforeach

    </table>

    <div class="w-4/5 m-auto mt-6 p-4 bg-black">
        {{ $stats->links() }}
    </div>
</x-layout>