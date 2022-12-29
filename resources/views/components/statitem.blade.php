@props(['stat', 'player', 'team'])

<tr {{ $attributes }}>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $player->name }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $team->name }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->plate_attempts }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->at_bats }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->runs }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->hits }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->doubles }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->triples }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->home_runs }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->runs_batted_in }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->base_on_balls }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->strike_outs }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->sacrifices }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $stat->home_run_outs }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
</tr>
