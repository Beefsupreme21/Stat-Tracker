<tr {{ $attributes }} x-show="player.totals.games_played" :class="index % 2 ? 'bg-gray-50' : 'bg-white'">
    <td :class="index % 2 ? 'bg-gray-50' : 'bg-white'" class="sticky left-0 whitespace-nowrap pl-4 pr-3 py-2 text-sm text-gray-500 sm:pl-6">
        <a :href="`/players/${player.id}`" x-text="player.name"></a>
    </td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.avg"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.obp"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.slg"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.ops"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.games_played"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.plate_attempts"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.at_bats"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.runs"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.hits"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.doubles"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.triples"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.home_runs"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.runs_batted_in"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.base_on_balls"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.strike_outs"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.sacrifices"></td>
    <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.home_run_outs"></td>
    <td class="py-2 pl-3 pr-4 sm:pr-6 text-sm text-gray-500 text-right" x-text="player.totals.taken_bases"></td>
</tr>
