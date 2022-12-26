<x-layout>
    @foreach ($games as $game)
        <tr>
            <td>{{ $game->runs }}</td>
            <td>{{ $game->doubles }}</td>
        </tr>
        @php
            $totalRuns += $game->runs;
            $totalDoubles += $game->doubles;
        @endphp
    @endforeach

    <tr>
        <td>Total Runs: {{ $totalRuns }}</td>
        <td>Total Doubles: {{ $totalDoubles }}</td>
    </tr>


    {{-- @php
        $totalRuns.$stat->player->name += $stat->runs;
        $totalDoubles.$stat->player->name += $game->doubles;
    @endphp --}}

    {{-- @php
        $totalRuns[$stat->player->name]['runs'] += $stat->runs;
        $totalDoubles[$stat->player->name]['doubles'] += $game->doubles;
    @endphp --}}

    {{-- @php
        ${'totalRuns' . $stat->player->name} += $stat->runs;
        ${'totalDoubles' . $stat->player->name} += $game->doubles;
    @endphp --}}

    {{-- <tr>
        <td>Total Runs: {{ $totalRuns }}{{ $stat->player->name }}</td>
        <td>Total Doubles: {{ $totalDoubles }}{{ $stat->player->name }}</td>
    </tr> --}}
</x-layout>