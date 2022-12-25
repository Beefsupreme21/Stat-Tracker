<x-layout>
    <div class="w-2/4 mx-auto">
        <h1>Add New Team</h1>

        <form action="/teams" method="POST">
            @csrf
            <span>Team Name</span>
            <input type="text" name="name" class="border border-black bg-gray-800">
            <input type="submit" value="Submit" class="p-2 border border-black bg-gray-500">
          </form> 
    </div>
</x-layout>
