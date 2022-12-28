<x-layout>

    <div x-data="dropdown" x-init="fetchTeam()">
        <div>
            <div class="flex m-10">
                <label for="team" class="mx-10">Team</label>
                <select x-model="currentTeam" x-on:change="changeTeam()" name="team_id" >
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex m-10">
                <label for="player" class="mx-10">Player</label>
                <select name="player_id">
                    @foreach ($team->players as $player)
                        <option value="{{$player->id}}">{{$player->name}}</option>
                    @endforeach       
                </select>
            </div>
        </div>            
        <div>
            currentTeam:  <span x-text="currentTeam"></span>
        </div>
    </div>






    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                options: [],
                currentTeam: '',

                // fetchTeam() {
                //     if ( request('team_id') ) {
                //         return this.currentTeam = {{ request('team_id') }}
                //     }
                // },

                // fetchTeam() {
                //     this.currentTeam = {{ request('team_id') }}
                // },

                updateSeasonOptions() {
                    // replace with a function that fetches the dependent options from your database
                    this.dependentOptions = ['Dependent Option 1', 'Dependent Option 2', 'Dependent Option 3']
                },

                updatePlayerOptions() {
                    // replace with a function that fetches the second set of dependent options from your database
                    this.dependentOptions2 = ['Dependent Option 4', 'Dependent Option 5', 'Dependent Option 6']
                }
            }))
        })
    </script>
</x-layout>


{{-- if (request('team_id' == $team->id)) {
    this.options = ['Option 1', 'Option 2', 'Option 3']
} 
else 
    this.options = ['Option 4', 'Option 5', 'Option 6'] --}}

    {{-- <form>
        <select x-model="selectedOption">
            <option value="">Select an option</option>
            <template x-for="option in options" :key="option">
                <option :value="option" x-text="option"></option>
            </template>
        </select>
    </form> --}}