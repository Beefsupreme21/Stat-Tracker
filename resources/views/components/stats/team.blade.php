@props(['team'])

<div x-data="teamStats" {{ $attributes }}>
    <div class="flex space-x-4 justify-end">
        <div>
            <select x-model="filteredPlayerType" class="text-gray-700">
                <option value=""></option>
                <option value="active">Active</option>
                <option value="sub">Sub</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
        <div>
            <select x-model="filteredMinGames" class="text-gray-700">
                <option value="0"></option>
                <option value="1">1 games min</option>
                <option value="2">2 games min</option>
                <option value="3">3 games min</option>
                <option value="4">4 games min</option>
                <option value="5">5 games min</option>
                <option value="6">6 games min</option>
                <option value="7">7 games min</option>
                <option value="8">8 games min</option>
                <option value="9">9 games min</option>
                <option value="10">10 games min</option>
            </select>
        </div>
    </div>
    <div class="overflow-x-auto">
        <div class="flex items-center space-x-1 mb-2">
            <button @click="filteredSeason = 'All'" 
                :class="filteredSeason === 'All' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">
                All
            </button>
            <div class="flex items-center">
                <template x-for="season in team.seasons">
                    <button @click="filteredSeason = season.id" 
                        :class="filteredSeason === season.id ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                        class="px-3 py-2 font-medium text-sm rounded-md whitespace-nowrap"
                        type="button" x-text="`${season.year} ${season.name}`">
                    </button>
                </template>
            </div>
        </div>
    </div>
  
    <template x-if="results.length">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="sticky left-0 bg-gray-50 py-2 pl-3 pr-1 text-left text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('name')" class="group inline-flex">
                                Player
                                <span :class="sortCol === 'name' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('avg')" class="group inline-flex">
                                <span :class="sortCol === 'avg' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                AVG
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('obp')" class="group inline-flex">
                                <span :class="sortCol === 'obp' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                OBP
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('slg')" class="group inline-flex">
                                <span :class="sortCol === 'slg' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                SLG
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('ops')" class="group inline-flex">
                                <span :class="sortCol === 'ops' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                OPS
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('iso')" class="group inline-flex">
                                <span :class="sortCol === 'iso' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                ISO
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('rc')" class="group inline-flex">
                                <span :class="sortCol === 'rc' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                RC
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('rcg')" class="group inline-flex">
                                <span :class="sortCol === 'rcg' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                RC/G
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('babip')" class="group inline-flex">
                                <span :class="sortCol === 'babip' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                BABIP
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-left text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('games_played')" class="group inline-flex">
                                <span :class="sortCol === 'games_played' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                G
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('plate_attempts')" class="group inline-flex">
                                <span :class="sortCol === 'plate_attempts' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                PA
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('at_bats')" class="group inline-flex">
                                <span :class="sortCol === 'at_bats' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                AB
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('runs')" class="group inline-flex">
                                <span :class="sortCol === 'runs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                R
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('hits')" class="group inline-flex">
                                <span :class="sortCol === 'hits' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                H
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('doubles')" class="group inline-flex">
                                <span :class="sortCol === 'doubles' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                2B
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('triples')" class="group inline-flex">
                                <span :class="sortCol === 'triples' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                3B
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('home_runs')" class="group inline-flex">
                                <span :class="sortCol === 'home_runs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                HR
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('runs_batted_in')" class="group inline-flex">
                                <span :class="sortCol === 'runs_batted_in' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                RBI
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('base_on_balls')" class="group inline-flex">
                                <span :class="sortCol === 'base_on_balls' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                BB
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('strike_outs')" class="group inline-flex">
                                <span :class="sortCol === 'strike_outs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                SO
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('sacrifices')" class="group inline-flex">
                                <span :class="sortCol === 'sacrifices' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                SAC
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('double_plays')" class="group inline-flex">
                                <span :class="sortCol === 'double_plays' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                DP
                            </button>
                        </th>
                        <th scope="col" class="py-2 px-1 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('home_run_outs')" class="group inline-flex">
                                <span :class="sortCol === 'home_run_outs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                HRO
                            </button>
                        </th>
                        <th scope="col" class="py-2 pl-1 pr-3 text-right text-sm font-semibold text-gray-900">
                            <button @click.prevent="sortBy('taken_bases')" class="group inline-flex">
                                <span :class="sortCol === 'taken_bases' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="mr-1 flex-none rounded">
                                    <template x-if="sortAsc">
                                        <x-svg.chevron-down class="h-5 w-5" />
                                    </template>
                                    <template x-if="!sortAsc">
                                        <x-svg.chevron-up class="h-5 w-5" />
                                    </template>
                                </span>
                                TB
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <template x-for="(player, index) in results" :key="index">
                        <tr x-show="player.totals.games_played" :class="index % 2 ? 'bg-gray-50' : 'bg-white'">
                            <td :class="index % 2 ? 'bg-gray-50' : 'bg-white'" class="sticky left-0 whitespace-nowrap pl-3 pr-1 py-2 text-sm text-gray-500">
                                <a :href="`/players/${player.id}`" x-text="player.name"></a>
                            </td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.avg"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.obp"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.slg"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.ops"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.iso"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.rc"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.rcg"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.babip"></td>
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
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.double_plays"></td>
                            <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="player.totals.home_run_outs"></td>
                            <td class="py-2 pl-1 pr-3 text-sm text-gray-500 text-right" x-text="player.totals.taken_bases"></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </template>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('teamStats', () => ({
                filteredSeason: 'All',
                team: @json($team),
                filteredMinGames: 0,
                filteredPlayerType: '',
                sortCol: 'ops',
                sortAsc: false,

                get results() {
                    let players = [...this.team.players];

                    if (this.filteredPlayerType) {
                        players = players.filter((player) => player.pivot.role === this.filteredPlayerType);
                    }

                    if (this.filteredSeason !== 'All') {
                        players = players
                            .map((player) => {
                                return {
                                    id: player.id,
                                    name: player.name,
                                    stats: player.stats.filter((stat) => stat.game.season_id === this.filteredSeason)
                                };
                            })
                            .filter((player) => player.stats.length);
                    }

                    if (this.filteredMinGames) {
                        players = players.filter((player) => player.stats.length >= this.filteredMinGames);
                    }

                    players = players.map((player) => {
                        const games_played = player.stats.length;
                        const plate_attempts = player.stats.reduce((a, b) => a + b.plate_attempts, 0);
                        const at_bats = player.stats.reduce((a, b) => a + b.at_bats, 0);
                        const runs = player.stats.reduce((a, b) => a + b.runs, 0);
                        const hits = player.stats.reduce((a, b) => a + b.hits, 0);
                        const doubles = player.stats.reduce((a, b) => a + b.doubles, 0);
                        const triples = player.stats.reduce((a, b) => a + b.triples, 0);
                        const home_runs = player.stats.reduce((a, b) => a + b.home_runs, 0);
                        const runs_batted_in = player.stats.reduce((a, b) => a + b.runs_batted_in, 0);
                        const base_on_balls = player.stats.reduce((a, b) => a + b.base_on_balls, 0);
                        const strike_outs = player.stats.reduce((a, b) => a + b.strike_outs, 0);
                        const sacrifices = player.stats.reduce((a, b) => a + b.sacrifices, 0);
                        const double_plays = player.stats.reduce((a, b) => a + b.double_plays, 0);
                        const home_run_outs = player.stats.reduce((a, b) => a + b.home_run_outs, 0);
                        const taken_bases = (hits - doubles - triples - home_runs) + (doubles * 2 + triples * 3 + home_runs * 4);
                        const avg = at_bats ? Number.parseFloat(hits / at_bats).toFixed(3) : '0.000';
                        const obp = Number.parseFloat((hits + base_on_balls) / plate_attempts).toFixed(3);
                        const slg = at_bats ? Number.parseFloat(taken_bases / at_bats).toFixed(3) : '0.000';
                        const ops = at_bats ? Number.parseFloat((hits + base_on_balls) / plate_attempts + (taken_bases / at_bats)).toFixed(3) : Number.parseFloat((hits + base_on_balls) / plate_attempts).toFixed(3);
                        const iso = Number.parseFloat(slg - avg).toFixed(3);
                        const rc = Number.parseFloat((hits + base_on_balls) * taken_bases / (at_bats + base_on_balls)).toFixed(0);
                        const rcg = Number.parseFloat(rc / games_played).toFixed(1);
                        const babip = (at_bats - strike_outs - home_runs - home_run_outs + sacrifices) ? Number.parseFloat((hits - home_runs) / (at_bats - strike_outs - home_runs - home_run_outs + sacrifices)).toFixed(3) : '0.000';


                        return {
                            id: player.id,
                            name: player.name,
                            totals: {
                                games_played: games_played,
                                plate_attempts: plate_attempts,
                                at_bats: at_bats,
                                runs: runs,
                                hits: hits,
                                doubles: doubles,
                                triples: triples,
                                home_runs: home_runs,
                                runs_batted_in: runs_batted_in,
                                base_on_balls: base_on_balls,
                                strike_outs: strike_outs,
                                sacrifices: sacrifices,
                                double_plays: double_plays,
                                home_run_outs: home_run_outs,
                                taken_bases: taken_bases,
                                avg: avg,
                                obp: obp,
                                slg: slg,
                                ops: ops,
                                iso: iso,
                                rc: rc,
                                rcg: rcg,
                                babip: babip,
                            },
                        };
                    });

                    if (this.sortCol !== '') {
                        players = players.sort((a, b) => {
                            if (this.sortCol === 'name') {
                                if (a.name < b.name) return this.sortAsc ? 1 : -1;
                                if (a.name > b.name) return this.sortAsc ? -1 : 1;
                                return 0;
                            }

                            if (['avg','obp','slg','ops', 'iso', 'babip'].includes(this.sortCol)) {
                                if (this.sortAsc) {
                                    return (a.totals[this.sortCol] * 1000) - (b.totals[this.sortCol] * 1000);
                                }

                                return (b.totals[this.sortCol] * 1000) - (a.totals[this.sortCol] * 1000);
                            }

                            if (this.sortAsc) {
                                return a.totals[this.sortCol] - b.totals[this.sortCol];
                            }

                            return b.totals[this.sortCol] - a.totals[this.sortCol];
                        });                        
                    }
                    return players;
                },

                sortBy(col) {
                    if (this.sortCol === col) {
                        this.sortAsc = !this.sortAsc;
                    } else {
                        this.sortAsc = false;
                    }

                    this.sortCol = col;
                }
            }));
        });
    </script>
@endpush
