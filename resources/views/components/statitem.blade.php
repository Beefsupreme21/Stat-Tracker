@props(['stat'])

<tr {{ $attributes }}>
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
