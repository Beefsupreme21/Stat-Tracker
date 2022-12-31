<x-layout>
    <h1>Edit Team</h1>
    <div>
        <form action="/teams/{{ $team->id }}" method="POST">
            @csrf
            @method('PUT')
            <span>Team Name</span>
            <input type="text" name="name" class="border border-black">
            <input type="submit" value="Update" class="border border-black">
          </form> 
    </div>
</x-layout>