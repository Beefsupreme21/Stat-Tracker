<x-layout>
    <h1>Edit Player</h1>
    <div>
        <form action="/players/{{ $player->name }}" method="POST">
            @csrf
            @method('PUT')
            <span>Player Name</span>
            <input type="text" name="name" class="border border-black">
            <input type="submit" value="Update" class="border border-black">
          </form> 
    </div>
</x-layout>