<x-layout>
    <form action="/stats" method="POST" class="border border-gray-200 max-w-[1200px] mx-auto mt-12 rounded-xl p-6">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Add stats</h3>
                <div class="space-y-6 sm:space-y-5">
                    <div x-data="dropdown" x-init="fetchOptions()">
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="team" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Team</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <select name="team_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}" @selected(request('team_id') == $team->id)>{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
    
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="season" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Season</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <select name="season_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    @foreach ($team->seasons as $season)
                                        <option value="{{ $season->id }}" @selected(request('season_id') == $season->id)>{{ $season->year }} - {{ $season->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>
    
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="player" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Player</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <select name="player_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    @foreach ($team->players as $player)
                                        <option value="{{$player->id}}">{{$player->name}}</option>
                                    @endforeach       
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="game_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Game ID</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <select name="game_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                @foreach ($games as $game)
                                    <option value="{{$game->id}}">{{$game->date}}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>



            
                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="plate_attempts" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Plate Attempts</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="plate_attempts" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="at_bats" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">At Bats</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="at_bats" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="runs" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Runs</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="runs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="hits" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Hits</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="hits" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="doubles" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Doubles</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="doubles" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="triples" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Triples</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="triples" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="home_runs" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Home Runs</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="home_runs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>
            
                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="runs_batted_in" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Runs Batted In</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input id="text" name="runs_batted_in" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>
            
                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="base_on_balls" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Base On Balls</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="base_on_balls" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="strike_outs" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Strike Outs</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="strike_outs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="sacrifices" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Sacrifices</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="sacrifices" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="home_run_outs" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Home Run Outs</label>
                        <div class="mt-1 sm:col-span-1 sm:mt-0">
                            <input type="text" name="home_run_outs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
      
        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
                <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add Stats</button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                options: [],
                selectedOption: '',
                dependentOptions: [],
                selectedDependentOption: '',
                dependentOptions2: [],
                selectedDependentOption2: '',

                fetchOptions() {
                    // replace with a function that fetches the options from your database
                    this.options = ['Option 1', 'Option 2', 'Option 3']
                },

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