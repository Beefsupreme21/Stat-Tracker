<x-layout>
    <div class="w-4/5 m-auto mb-12">
        <a href="/players/{{ $player->name }}" class="text-xl hover:underline">Back to player page</a>
        <div class="text-center text-4xl">
            {{ $player->name }}'s Teams
        </div>
    </div>

    <div class="w-4/5 mx-auto flex justify-between">
        <table class="w-2/5 h-min">
            <thead> 
                <tr class="border border-gray-600 text-left">
                    <th class="p-4">Player Name</th>
                </tr>
            </thead>

            @foreach ($player->teams as $team)

            <tbody>
                <tr class="border border-gray-600">
                    <td class="p-4">
                        <a href="/teams/{{ $team->name }}">
                            <button class="text-blue-500 hover:underline pr-3">
                                {{ $team->name }}
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/players/{{ $player->name }}/teams/{{ $team->name }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>

            @endforeach

        </table>

        <table class="w-2/5 h-min">
            <thead> 
                <tr class="border border-gray-600 text-left">
                    <th class="p-4">Player Name</th>
                </tr>
            </thead>
            @foreach ($teams->sortBy('name') as $team)
            <tbody>
                <tr class="border border-gray-600">
                    <td class="p-4">
                        <a href="/teams/{{ $team->name }}">
                            <button class="text-blue-500 hover:underline pr-3">
                                {{ $team->name }}
                            </button>
                        </a>
                    </td>
                    <td>           
                        <form action="/players/{{ $player->name }}/teams" method="POST">
                            @csrf
                            <input type="hidden" name="team_id" value="{{ $team->id }}">
                            <button type="submit" class="hover:underline">Add</button>
                        </form>
                    </td>
                </tr>

            </tbody>
            @endforeach
        </table>
    </div>

</x-layout>
