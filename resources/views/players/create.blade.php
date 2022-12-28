<x-layout>
    <h1>Add New Player</h1>
    <div>
        <x-validation-errors />
        <form action="/players" method="POST">
            @csrf
            <span>Player Name</span>
            @if (request('team_id'))
                <input type="hidden" name="team_id" value="{{ request('team_id') }}" class="border border-black">
            @endif
            <input type="text" name="name" class="border border-black">
            <input type="submit" value="Submit" class="border border-black">
        </form> 
    </div>
</x-layout>