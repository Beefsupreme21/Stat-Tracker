<x-layout>

    <div class="w-4/5 m-auto mb-12">
        <a href="/teams/{{ $team->name }}" class="text-xl hover:underline">Back to team page</a>

        <div class="text-center text-4xl">
            <p>Edit {{ $team->name }} Roster</p>
        </div>
    </div>

    <div class="w-4/5 mx-auto flex justify-between">
        <table class="w-2/5 h-min">
            <thead> 
                <tr class="border border-gray-600 text-left">
                    <th class="p-4">{{ $team->name }} Players</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team->players as $player)

                <tr class="border border-gray-600">
                    <td class="p-4">
                        <a href="/players/{{ $player->name }}">
                            <button class="text-blue-500 hover:underline pr-3">
                                {{ $player->name }}
                            </button>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="/teams/{{ $team->name }}/players/{{ $player->name }}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 hover:underline">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <table class="w-2/5 h-min">
            <thead> 
                <tr class="border border-gray-600 text-left">
                    <th class="p-4">Player Name</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border border-gray-600">
                    <td class="p-4">
                        <a href="/players/create?team_id={{ $team->id }}">
                            <button class="text-blue-500 hover:underline pr-3">
                                Add new Player
                            </button>
                        </a>
                    </td>
                </tr>
                @foreach ($players as $player)
                    <tr class="border border-gray-600">
                        <td class="p-4">
                            <a href="/players/{{ $player->id }}">
                                <button class="text-blue-500 hover:underline pr-3">
                                    {{ $player->name }}
                                </button>
                            </a>
                        </td>
                        <form action="/teams/{{ $team->id }}/players" method="POST">
                            <td>            
                                @csrf
                                <input type="hidden" name="player_id" value="{{ $player->id }}">
                                <button type="submit">Add</button>
                            </td>
                        </form>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</x-layout>
