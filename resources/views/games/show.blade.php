<x-layout>
    <h1>Show Page</h1>
    <div class="flex">
        <div>
            <ul>
                <li>Game: {{ $game->id }}</li>
                <li>Location: {{ $game->location }}</li>
                <li>Umpire: {{ $game->umpire }}</li>
                <li>Weather: {{ $game->weather }}</li>
                <li>Opponent: {{ $game->opponent }}</li>
                <li>Date: {{ $game->date }}</li>
            </ul>
        </div>

        <a href="/games/{{ $game->id }}/edit">
            <button class="text-red-500 hover:underline pr-3">
                Edit
            </button>
        </a>
        <form method="POST" action="/games/{{ $game->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:underline">
                Delete
            </button>
        </form>
    </div>
    <span>Created At </span>{{ $game->created_at }}
</x-layout>
