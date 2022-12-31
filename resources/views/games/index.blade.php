<x-layout>
    <div class="text-center mb-8">
        <p class="text-4xl">Games</p> 
        <a href="/games/create"><p class="pt-3 hover:underline hover:font-bold ">Add Game</p></a>
    </div>
    <table class="table-auto w-4/5 m-auto">
        <thead> 
            <tr class="border-b border-gray-600 border-collapse text-left">
                <th class="px-4">Game</th>
                <th class="px-4">Location</th>
                <th class="px-4">Umpire</th>
                <th class="px-4">Weather</th>
                <th class="px-4">Opponent</th>
                <th class="px-4">Date</th>
            </tr>
        </thead>
        @foreach ($games as $game)
            <tbody>
                <tr class="border border-gray-600">
                    <td class="p-4 border-r border-gray-600">
                        <a href="/games/{{ $game->id }}">
                            <button class="text-blue-500 hover:underline pr-3">
                                Game {{ $game->id }}
                            </button>
                        </a>
                    </td>
                    <td class="p-4 border-r border-gray-600">{{ $game->location }}</td>
                    <td class="p-4 border-r border-gray-600">{{ $game->umpire }}</td>
                    <td class="p-4 border-r border-gray-600">{{ $game->weather }}</td>
                    <td class="p-4 border-r border-gray-600">{{ $game->opponent }}</td>
                    <td class="p-4 border-r border-gray-600">{{ date('M d, y', strtotime($game->date)) }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
</x-layout>