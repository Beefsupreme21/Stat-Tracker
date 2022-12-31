<x-layout>
    <div class="mx-auto mb-4 md:flex md:items-center md:justify-between md:w-4/5">
        <div class="min-w-0 flex-1">
            <h1 class="text-2xl font-bold leading-7 text-gray-900 ml-3 sm:truncate sm:text-3xl sm:tracking-tight">Teams</h1>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <a href="/teams/create" class="ml-3 inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Add New Team</a>
        </div>
    </div>
    <div class="overflow-hidden bg-white shadow sm:rounded-md md:w-4/5 mx-auto">
        <ul role="list" class="divide-y divide-gray-200">
            @foreach ($teams as $team)
                <li>
                    <a href="/teams/{{ $team->id }}" class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="truncate text-sm font-medium text-indigo-600">{{ $team->name }}</p>
                                <div class="ml-2 flex flex-shrink-0">
                                    <p class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Win/Loss {{ $wins = $team->games->where('outcome', 'win')->count() }}-{{ $wins = $team->games->where('outcome', 'lose')->count() }}</p>
                                    <p> </p>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        Seasons Played {{ $team->seasons->count() }}
                                    </p>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <p>Roster Size {{ $team->players->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>
