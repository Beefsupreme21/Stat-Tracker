@props(['team'])

<div x-data="teamStats" {{ $attributes }}>
    <div class="flex items-center space-x-1 mb-2 overflow-y-auto" role="group" aria-label="Filter by class">
        <button @click="filteredSeason = 'All'" 
            :class="filteredSeason === 'All' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
            class="px-3 py-2 font-medium text-sm rounded-md"
            type="button">All</button>
        <template x-for="season in team.seasons">
            <button @click="filteredSeason = season.id" 
                :class="filteredSeason === season.id ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button" x-text="`${season.year} ${season.name}`"></button>
        </template>
    </div>
  
    <template x-if="results.length">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
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
                    <th scope="col" class="py-3.5 px-2 text-left text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('team')" class="group inline-flex">
                            Team
                            <span :class="sortCol === 'team' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-left text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('games_played')" class="group inline-flex">
                            G
                            <span :class="sortCol === 'games_played' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('plate_attempts')" class="group inline-flex">
                            PA
                            <span :class="sortCol === 'plate_attempts' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('at_bats')" class="group inline-flex">
                            AB
                            <span :class="sortCol === 'at_bats' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('runs')" class="group inline-flex">
                            R
                            <span :class="sortCol === 'runs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('hits')" class="group inline-flex">
                            H
                            <span :class="sortCol === 'hits' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('doubles')" class="group inline-flex">
                            2B
                            <span :class="sortCol === 'doubles' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('triples')" class="group inline-flex">
                            3B
                            <span :class="sortCol === 'triples' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('home_runs')" class="group inline-flex">
                            HR
                            <span :class="sortCol === 'home_runs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('runs_batted_in')" class="group inline-flex">
                            RBI
                            <span :class="sortCol === 'runs_batted_in' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('base_on_balls')" class="group inline-flex">
                            BB
                            <span :class="sortCol === 'base_on_balls' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('strike_outs')" class="group inline-flex">
                            SO
                            <span :class="sortCol === 'strike_outs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('sacrifices')" class="group inline-flex">
                            SAC
                            <span :class="sortCol === 'sacrifices' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('home_run_outs')" class="group inline-flex">
                            HRO
                            <span :class="sortCol === 'home_run_outs' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('taken_bases')" class="group inline-flex">
                            TB
                            <span :class="sortCol === 'taken_bases' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('avg')" class="group inline-flex">
                            AVG
                            <span :class="sortCol === 'avg' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('obp')" class="group inline-flex">
                            OBP
                            <span :class="sortCol === 'obp' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                    <th scope="col" class="py-3.5 px-2 text-right text-sm font-semibold text-gray-900">SLG</th>
                    <th scope="col" class="py-3.5 pl-3 pr-4 sm:pr-6 text-right text-sm font-semibold text-gray-900">
                        <button @click.prevent="sortBy('ops')" class="group inline-flex">
                            OPS
                            <span :class="sortCol === 'ops' ? 'bg-gray-200 text-gray-900 group-hover:bg-gray-300': 'invisible text-gray-400 group-hover:visible group-focus:visible'" class="ml-2 flex-none rounded">
                                <template x-if="sortAsc">
                                    <x-svg.chevron-down class="h-5 w-5" />
                                </template>
                                <template x-if="!sortAsc">
                                    <x-svg.chevron-up class="h-5 w-5" />
                                </template>
                            </span>
                        </button>
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <template x-for="(player, index) in results" :key="index">
                    <x-team-stats.item ::class="index % 2 ? 'bg-gray-50' : 'bg-white'"></x-team-stats.item>
                </template>
            </tbody>
        </table>
    </template>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('teamStats', () => ({
                filteredSeason: 'All',
                team: @json($team),
                sortCol: '',
                sortAsc: false,

                get results() {
                    let players = [...this.team.players];

                    if (this.filteredSeason !== 'All') {
                        filteredPlayers = players.filter((player) => {
                            return player.stats.filter((stat) => {
                                return stat.game.season.id === this.filteredSeason;
                            }).length;
                        });
                        players = filteredPlayers;
                    }

                    if (this.sortCol !== '') {
                        players = players.sort((a, b) => {
                            if (this.sortCol === 'name') {
                                if (a.name < b.name) return this.sortAsc ? 1 : -1;
                                if (a.name > b.name) return this.sortAsc ? -1 : 1;
                                return 0;
                            }
                            if (this.sortCol === 'games_played') {
                                if (a.stats.length < b.stats.length) return this.sortAsc ? 1 : -1;
                                if (a.stats.length > b.stats.length) return this.sortAsc ? -1 : 1;
                                return 0;
                            }
                            if (this.sortCol === 'avg') {
                                a.totalHits = a.stats.reduce((a, b) => a + b.hits, 0);
                                a.totalAtBats = a.stats.reduce((a, b) => a + b.at_bats, 0);
                                b.totalHits = b.stats.reduce((a, b) => a + b.hits, 0);
                                b.totalAtBats = b.stats.reduce((a, b) => a + b.at_bats, 0);
                                a.totalAvg = a.totalHits / a.totalAtBats;
                                b.totalAvg = b.totalHits / b.totalAtBats;

                                if (a.totalAvg < b.totalAvg) return this.sortAsc ? 1 : -1;
                                if (a.totalAvg > b.totalAvg) return this.sortAsc ? -1 : 1;
                                return 0;
                            }
                            if (this.sortCol === 'ops') {
                                a.totalHits = a.stats.reduce((a, b) => a + b.hits, 0);
                                a.totalDoubles = a.stats.reduce((a, b) => a + b.doubles, 0);
                                a.totalTriples = a.stats.reduce((a, b) => a + b.triples, 0);
                                a.totalHomeRuns = a.stats.reduce((a, b) => a + b.home_runs, 0);
                                a.totalAtBats = a.stats.reduce((a, b) => a + b.at_bats, 0);
                                a.totalBaseOnBalls = a.stats.reduce((a, b) => a + b.base_on_balls, 0);
                                a.totalPlateAttempts = a.stats.reduce((a, b) => a + b.plate_attempts, 0);
                                a.totalTakenBases = (a.totalHits - a.totalDoubles - a.totalTriples - a.totalHomeRuns) + (a.totalDoubles * 2 + a.totalTriples * 3 + a.totalHomeRuns * 4);

                                b.totalHits = b.stats.reduce((a, b) => a + b.hits, 0);
                                b.totalDoubles = b.stats.reduce((a, b) => a + b.doubles, 0);
                                b.totalTriples = b.stats.reduce((a, b) => a + b.triples, 0);
                                b.totalHomeRuns = b.stats.reduce((a, b) => a + b.home_runs, 0);
                                b.totalAtBats = b.stats.reduce((a, b) => a + b.at_bats, 0);
                                b.totalBaseOnBalls = b.stats.reduce((a, b) => a + b.base_on_balls, 0);
                                b.totalPlateAttempts = b.stats.reduce((a, b) => a + b.plate_attempts, 0);
                                b.totalTakenBases = (b.totalHits - b.totalDoubles - b.totalTriples - b.totalHomeRuns) + (b.totalDoubles * 2 + b.totalTriples * 3 + b.totalHomeRuns * 4);
                                
                                a.ops = Number.parseFloat((a.totalHits + a.totalBaseOnBalls) / a.totalPlateAttempts + (a.totalTakenBases / a.totalAtBats)).toFixed(3) * 1000;
                                b.ops = Number.parseFloat((b.totalHits + b.totalBaseOnBalls) / b.totalPlateAttempts + (b.totalTakenBases / b.totalAtBats)).toFixed(3) * 1000;

                                if (a.ops < b.ops) return this.sortAsc ? 1 : -1;
                                if (a.ops > b.ops) return this.sortAsc ? -1 : 1;
                                return 0;
                            }

                            a.total = a.stats.reduce((a, b) => a + b[this.sortCol], 0);
                            b.total = b.stats.reduce((a, b) => a + b[this.sortCol], 0);
                            
                            if (a.total < b.total) return this.sortAsc ? 1 : -1;
                            if (a.total > b.total) return this.sortAsc ? -1 : 1;
                            return 0;
                        });                        
                    }
                    return players;
                },

                sortBy(col) {
                    if (this.sortCol === col) {
                        this.sortAsc = !this.sortAsc;
                    } else {
                        this.sortAsc = true;
                    }

                    this.sortCol = col;
                }
            }));
        });
    </script>
@endpush
