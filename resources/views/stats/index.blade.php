<x-layout>
    <div class="text-center mb-8">
        <p class="text-4xl">Stats</p> 
        <a href="/stats/create"><p class="pt-3 hover:underline hover:font-bold "> Add Stats</p></a>
    </div>

    <x-statlist :stats="$stats" />

</x-layout>