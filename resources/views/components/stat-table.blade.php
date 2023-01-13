@props([
    'stats', 
    'seasons' => [],
])

<div x-data="statTable" {{ $attributes }}>
    <div class="sm:flex items-center sm:space-x-4 mb-2">
        {{-- <div class="grow mb-2">
            <label class="sr-only" for="searchText">Search</label>
            <input x-model="searchText" id="searchText" type="text" :placeholder="`Search ${listings.length} listings`" class="block w-full rounded-md border-gray-300 py-3 px-4 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        </div> --}}
        {{-- <div class="mb-2">
            <span class="sr-only">Order by price</span>
            <div class="flex space-x-2" role="group" aria-label="Filters">
                <button @click="sortBy = 'expensive'" 
                    :class="sortBy === 'expensive' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                    class="w-full sm:w-auto px-3 py-2 font-medium text-sm rounded-md"
                    type="button">Most Expensive</button>
                <button @click="sortBy = 'cheap'" 
                    :class="sortBy === 'cheap' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                    class="w-full sm:w-auto px-3 py-2 font-medium text-sm rounded-md"
                    type="button">Least Expensive</button>
            </div>
        </div> --}}
    </div>
    <div class="flex items-center space-x-1 mb-2 overflow-y-auto" role="group" aria-label="Filter by class">
        <button @click="filteredSeason = 'All'" 
            :class="filteredSeason === 'All' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
            class="px-3 py-2 font-medium text-sm rounded-md"
            type="button">All</button>
        <template x-for="season in seasons">
            <button @click="filteredSeason = season.id" 
                :class="filteredSeason === season.id ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button" x-text="`${season.year} ${season.name}`"></button>
        </template>
    </div>
    {{-- <template x-if="filteredSeason === 'All' || filteredSeason === 'Residential'" >
        <div class="flex items-center space-x-1 mb-2 overflow-y-auto" role="group" aria-label="Filter by type">
            <button @click="filterPropertySubType = 'All'" 
                :class="filterPropertySubType === 'All' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">All</button>
            <button @click="filterPropertySubType = 'Recreational'" 
                :class="filterPropertySubType === 'Recreational' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'"
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">Recreational</button>
            <button @click="filterPropertySubType = 'Condominium'" 
                :class="filterPropertySubType === 'Condominium' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'" 
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">Condominium</button>
            <button @click="filterPropertySubType = 'Twinhome'" 
                :class="filterPropertySubType === 'Twinhome' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'" 
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">Twinhome</button>
            <button @click="filterPropertySubType = 'Townhouse'" 
                :class="filterPropertySubType === 'Townhouse' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'" 
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">Townhouse</button>
            <button @click="filterPropertySubType = 'MH'" 
                :class="filterPropertySubType === 'MH' ? 'bg-gray-200 text-gray-700' : 'text-gray-500 hover:text-gray-700'" 
                class="px-3 py-2 font-medium text-sm rounded-md"
                type="button">Mobile Homes</button>
        </div>
    </template> --}}
            
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
                <template x-for="stat in results">
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                            <a :href="`/players/${stat.player.id}`" x-text="stat.player.name"></a>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
                            <a :href="`/teams/${stat.team.id}`" x-text="stat.team.name"></a>
                        </td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.games_played"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.plate_attempts"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.at_bats"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.runs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.hits"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.doubles"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.triples"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.home_runs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.runs_batted_in"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.base_on_balls"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.strike_outs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.sacrifices"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.home_run_outs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.taken_bases"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.avg"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.obp"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.slg"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 text-right" x-text="stat.ops"></td>
                    </tr>
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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('statTable', () => ({
            filteredSeason: 'All',
            // filterPropertySubType: 'All',
            stats: @json($stats),
            seasons: @json($seasons),
            // resultLimit: 24,
            // resultIncrement: 96,
            {{--// searchText: @json($searchQuery), --}}
            // sortBy: '',

            get results() {
                let stats = [...this.stats];
                // let stats = this.stats.filter((listing) => {
                //     if (this.searchText === '') return true;

                //     const search = listing.search;

                //     return search.indexOf(this.searchText.toLowerCase()) > -1;
                // });

                if (this.filteredSeason !== 'All') {
                    stats = stats.filter((stat) => {
                        return stat.seasons.includes(this.filteredSeason);
                    });
                }

                // if (this.filterPropertySubType !== 'All') {
                //     stats = stats.filter((listing) => {
                //         return listing.property_sub_type === this.filterPropertySubType;
                //     });
                // }

                // if (this.sortBy === 'cheap') {
                //     stats.sort((a, b) => a.current_price - b.current_price);
                // } else if (this.sortBy === 'expensive') {
                //     stats.sort((a, b) => b.current_price - a.current_price);
                // }

                // return this.stats;
                return stats.sort((a, b) => b.ops - a.ops);
                // return stats.slice(0, this.resultLimit);
            },
        }))
    })
</script>
