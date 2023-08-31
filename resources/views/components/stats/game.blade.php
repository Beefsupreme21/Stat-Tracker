@props([
    'stats',
])

<table {{ $attributes }} class="w-full">
    <thead class="bg-gray-200 min-w-full divide-y divide-gray-300"> 
        <tr>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Player</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">PA</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">AB</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">R</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">H</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">2B</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">3B</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">HR</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">RBI</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">BB</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SO</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SAC</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">HRO</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">TB</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">AVG</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OBP</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SLG</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OPS</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">ISO</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">RC</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">BABIP</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
        @foreach ($stats as $stat)
            <tr>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                    <a href="/players/{{ $stat->player->id }}">{{ $stat->player->name }}</a>
                </td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->plate_attempts }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->at_bats }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->runs }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->hits }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->doubles }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->triples }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->home_runs }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->runs_batted_in }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->base_on_balls }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->strike_outs }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->sacrifices }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->home_run_outs }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->taken_bases }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->avg }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->obp }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->slg }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->ops }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->iso }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->rc }}</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->babip }}</td>
            </tr>
        @endforeach
        <tr class="font-semibold">
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Totals</td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('plate_attempts') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('at_bats') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('runs') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('hits') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('doubles') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('triples') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('home_runs') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('runs_batted_in') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('base_on_balls') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('strike_outs') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('sacrifices') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('home_run_outs') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ $stats->sum('taken_bases') }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('avg'), 3) }}
            </td> 
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('obp'), 3) }}
            </td>            
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('slg'), 3) }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('ops'), 3) }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('iso'), 3) }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('rc'), 1) }}
            </td>
            <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">
                {{ number_format($stats->avg('babip'), 3) }}
            </td>
        </tr>
    </tbody>
</table>
