@props(['teams'])

<div x-data="teamSeasonInputs" {{ $attributes }}>
    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
        <label for="team" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Team</label>
        <div class="mt-1 sm:col-span-1 sm:mt-0">
            <select x-model="selectedTeamId" name="team_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                <option value=""></option>
                <template x-for="team in teams">
                    <option :value="team.id" x-text="team.name"></option>
                </template>
            </select>
        </div>
    </div>
    
    <template x-if="teamSeasons.length">
        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
            <label for="season" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Season</label>
            <div class="mt-1 sm:col-span-1 sm:mt-0">
                <select name="season_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                    <template x-for="season in teamSeasons">
                        <option :value="season.id" x-text="`${season.year} ${season.name}`"></option>
                    </template>                         
                </select>
            </div>
        </div>
    </template>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('teamSeasonInputs', () => ({
            teams: @json($teams),
            selectedTeamId: '',
            selectedSeason: '',

            get teamSeasons() {
                if (this.selectedTeamId) {
                    const team = this.teams.find((team) => { 
                        return team.id === parseInt(this.selectedTeamId);
                    });

                    if (team.seasons.length) {
                        return team.seasons;
                    }
                }
                
                return [];
            },
        }))
    })
</script>