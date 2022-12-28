<x-layout>
    <div class="border border-gray-200 max-w-[1200px] mx-auto mt-12 rounded-xl p-6">
        <x-validation-errors />   
        <form action="/games" method="POST" >
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add a new game</h3>
                    <div class="space-y-6 sm:space-y-5">
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
                                        <option value="{{ $season->id }}">{{ $season->year }} - {{ $season->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>
    
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Date</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input type="datetime-local" name="date" value="{{ old('date', now('America/Chicago')) }}" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="location" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Location</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input type="text" name="location" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="opponent" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Opponent</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input id="text" name="opponent" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="weather" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Weather</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input type="text" name="weather" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="umpire" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Umpire</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <input type="text" name="umpire" class="block w-full max-w-lg rounded-md border border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:max-w-xs sm:text-sm">
                            </div>
                        </div>
                
                        <div class="sm:grid sm:grid-cols-2 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="outcome" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">Win/Loss</label>
                            <div class="mt-1 sm:col-span-1 sm:mt-0">
                                <div class="flex items-center">
                                    <input type="radio" class="mr-2" id="win" name="outcome" value="win">
                                    <label for="win">Win</label>
                                </div>
                                <div class="flex items-center mt-2">
                                    <input type="radio" class="mr-2" id="loss" name="outcome" value="lose">
                                    <label for="loss">Loss</label>
                                </div>
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
    </div>

</x-layout>