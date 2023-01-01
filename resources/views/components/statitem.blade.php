@props(['stat', 'player', 'team'])

<tr {{ $attributes }}>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
        <a href="/players/{{ $player->id }}">{{ $player->name }}</a>
    </td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $team->name }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ $stat->games_played }}</td>
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
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ number_format((float) $stat->hits / $stat->at_bats, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ number_format((float) ($stat->hits + $stat->base_on_balls) / $stat->plate_attempts, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ number_format((float) $stat->taken_bases / $stat->at_bats, 3, '.') }}</td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right">{{ number_format((float) (($stat->hits + $stat->base_on_balls) / $stat->plate_attempts) + ($stat->taken_bases / $stat->at_bats), 3, '.') }}</td>
</tr>
