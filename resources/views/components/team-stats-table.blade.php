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
        <table>
            <thead class="bg-gray-200 min-w-full divide-y divide-gray-300"> 
                <tr>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Player</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Team</th>
                    <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">G</th>
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
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <template x-for="(player, index) in results" :key="index">
                    <x-team-stats-row></x-team-stats-row>
                </template>
            </tbody>
        </table>
    </template>

    {{-- <template x-if="listings.length > resultLimit">
        <div class="text-center">
            <button @click="resultLimit += resultIncrement" class="mt-5 inline-block rounded-lg border border-transparent bg-white px-6 py-3 text-center text-base font-medium text-green-700 hover:bg-green-700 hover:text-white">Show More Listings</button>
        </div>
    </template>

    <template x-if="!results.length">
        <p role="alert">Sorry, there are no results available that match your search. Please refine your search terms in the input above.</p>
    </template> --}}
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('teamStats', () => ({
                filteredSeason: 'All',
                team: @json($team),
                // resultLimit: 24,
                // resultIncrement: 96,
                // sortBy: '',

                get results() {
                    let players = [...this.team.players];

                    if (this.filteredSeason !== 'All') {
                        filteredPlayers = players.filter((player) => {
                            return player.stats.filter((stat) => {
                                return stat.game.season.id === this.filteredSeason;
                            }).length;
                        });
                        players = filteredPlayers;
                            
                        // players = players.filter((player) => {
                        //     return player.stats.length;
                        // });
                    }

                    // if (this.sortBy === 'cheap') {
                    //     players.sort((a, b) => a.current_price - b.current_price);
                    // } else if (this.sortBy === 'expensive') {
                    //     players.sort((a, b) => b.current_price - a.current_price);
                    // }

                    // return players;
                    return players.sort((a, b) => {
                        b.totalOps - a.totalOps;
                    });
                    // return players.slice(0, this.resultLimit);
                },
            }));
        });
    </script>
@endpush
