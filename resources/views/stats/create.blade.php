<x-layout>
    <div class="border border-gray-200 max-w-[1200px] mx-auto mt-12 rounded-xl p-6">
        <x-validation-errors />
        <form action="/stats" method="POST">
            @csrf
            <input type="hidden" name="team_id" value="{{ request('team_id') }}" />
            <input type="hidden" name="game_id" value="{{ request('game_id') }}" />
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <h1 class="text-lg font-medium leading-6 text-gray-900">Add stats</h1>
                    <div class="space-y-6 sm:space-y-5">
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Player</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <select name="player_id" class="block w-full max-w-lg rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                                    <option value=""></option>
                                    @foreach ($team->players as $player)
                                        @if (!$player->stats->count())
                                            <option value="{{$player->id}}" @selected(old('player_id', 0) == $player->id)>{{$player->name}}</option>
                                        @endif
                                    @endforeach       
                                </select>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Plate Attempts</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('plate_attempts', 0) }}" type="text" name="plate_attempts" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">At Bats</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('at_bats', 0) }}" type="text" name="at_bats" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Runs</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('runs', 0) }}" type="text" name="runs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Hits</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('hits', 0) }}" type="text" name="hits" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Doubles</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('doubles', 0) }}" type="text" name="doubles" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Triples</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('triples', 0) }}" type="text" name="triples" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Home Runs</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('home_runs', 0) }}" type="text" name="home_runs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Runs Batted In</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('runs_batted_in', 0) }}" type="text" name="runs_batted_in" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Base On Balls</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('base_on_balls', 0) }}" type="text" name="base_on_balls" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Strike Outs</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('strike_outs', 0) }}" type="text" name="strike_outs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Sacrifices</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('sacrifices', 0) }}" type="text" name="sacrifices" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Double Plays</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('double_plays', 0) }}" type="text" name="double_plays" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Home Run Outs</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input value="{{ old('home_run_outs', 0) }}" type="text" name="home_run_outs" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    @if (request('game_id'))
                        <a href="/games/{{ request('game_id') }}" class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>
                    @endif
                    <button type="submit" class="ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add Stats</button>
                </div>
            </div>
        </form>
    </div>
</x-layout>