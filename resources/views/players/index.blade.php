<x-layout>
    <div class="text-center mb-8">
        <p class="text-4xl">Players</p> 
        <a href="/players/create"><p class="pt-3 hover:underline hover:font-bold ">Add New Player</p></a>
    </div>

    <div class="w-4/5 mx-auto">
        <form action="/players/search" method="POST">
            @csrf
            <div class="flex justify-end items-center">
                <input
                    type="text"
                    name="search"
                    class="bg-black border border-gray-600 p-2 rounded-lg focus:outline-none"
                    placeholder="Search Player Name"
                    value="{{ request('search') ?? null }}"
                />
                <div>
                    <button type="submit" class="bg-[#041E42] ml-6 px-4 py-2 text-white rounded-lg">
                        Search
                    </button>
                </div>
            </div>
        </form>
    </div>

    <table class="w-4/5 m-auto">
        <thead> 
            <tr class="border-b border-gray-600 border-collapse text-left">
                <th class="px-4">Player Name</th>
                <th class="px-4">Teams</th>
            </tr>
        </thead>

        @foreach ($players as $player)

        <tbody>
            <tr class="border border-gray-600">
                <td class="p-4 border-r border-gray-600">
                    <a href="/players/{{ $player->name }}">
                        <button class="text-blue-500 hover:underline">
                            {{ $player->name }}
                        </button>
                    </a>
                </td>
                <td class="pl-4">
                    @foreach ($player->teams as $team) 

                    <a href="/teams/{{ $team->name }}">
                        <button class="text-blue-500 hover:underline">
                            {{ $team->name }}
                        </button>
                    </a>
                        
                    @endforeach
                </td>
            </tr>
        </tbody>
            
        @endforeach

    </table>
</x-layout>