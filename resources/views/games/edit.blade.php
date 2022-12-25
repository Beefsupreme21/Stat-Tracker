<x-layout>
    <h1>Edit Game</h1>
    <div>
        <form action="/games/{{ $game->id }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>Location</label>
                <input type="text" name="location" class="border border-black" value="{{ $game->location }}">
            </div>
            <div>
                <label>Umpire</label>
                <input type="text" name="umpire" class="border border-black" value="{{ $game->umpire }}">
            </div>
            <div>
                <label>Weather</label>
                <input type="text" name="weather" class="border border-black" value="{{ $game->weather }}">
            </div>
            <div>
                <label>Opponent</label>
                <input type="text" name="opponent" class="border border-black" value="{{ $game->opponent }}">
            </div>
            <div>
                <label>Date</label>
                <input type="text" name="date" class="border border-black" value="{{ $game->date }}">
            </div>

            <input type="submit" value="Submit" class="border border-black">

        </form> 
</x-layout>