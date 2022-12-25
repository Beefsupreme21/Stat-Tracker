<x-layout>
    <h1>Add New Player</h1>
    <div>
        <form action="/players" method="POST">
            @csrf
            <span>Player Name</span>
            <input type="text" name="name" class="border border-black">
            <input type="submit" value="Submit" class="border border-black">
        </form> 
    </div>
</x-layout>