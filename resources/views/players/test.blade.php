<x-layout>
    <div class="flex w-4/5 m-auto">
        <div class="border border-gray-600 h-min w-1/4 py-6 text-center mx-auto">
            <div class="mb-6 text-xl font-bold">{{ $player->name }}</div>
            <img src="{{asset('images/default_profile.png')}}" class="mx-auto w-52 mb-6" alt="">
            <div class="mb-6">        
                @if ($player->teams->count() == 0)
                    <p>This player isn't assigned to any teams</p>
                @else
                    <p class="text-lg font-bold">Teams</p>
                    <ul class="list-none">
                        @foreach ($player->teams as $team) 
                        <a href="/teams/{{ $team->name }}">
                            <li class="text-cyan-600 hover:underline">{{ $team->name }}</li>
                        </a>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="mb-6">        
                Joined on {{ date('M d, y', strtotime( $player->created_at )) }}
            </div>
            <div>
                <a href="/players/{{ $player->name }}/teams">
                    <button class="text-cyan-600 hover:underline">
                        Edit Teams
                    </button>
                </a>
            </div>
            <div class="mb-2">
                <a href="/players/{{ $player->name }}/edit">
                    <button class="text-cyan-600 hover:underline">
                        Edit Player Details
                    </button>
                </a>
            </div>
            <form method="POST" action="/players/{{ $player->name }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500 hover:underline">
                    Delete Player
                </button>
            </form>
        </div>

        <div x-data="sort">
            <div class="text-center border-x border-t border-gray-600 p-4">
                <span>Recent Games</span>
            </div>

            <div>
                <button x-on:click="getContent">Expand</button>
             
                <span x-show="open">
                  Content...
                </span>
            </div>

            <table>
                <thead> 
                    <tr class="border border-gray-600 border-collapse text-left">
                        <th x-on:click="sort('date')" class="p-4 border-r border-gray-600 cursor-pointer">Date</th>
                        <th class="p-4 border-r border-gray-600">Team</th>
                        <th class="p-4 border-r border-gray-600">At Bats</th>
                    </tr>
                </thead>

                <tbody>
                    <template x-for="answer in currentQuestion.answers">
                        <button @click.prevent="makeSelection(answer)">
                            <span x-text="answer.text"></span>
                        </button>
                    </template>

                    <template x-for="stat in player.stats">
                        <tr class="border border-gray-600 border-collapse text-left">
                            <td class="p-4 border-r border-gray-600" x-text="stat.game.date"></td>
                            <td class="p-4 border-r border-gray-600"></td>
                            <td class="p-4 border-r border-gray-600"></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('sort', () => ({
                    open: false,
                    stats: {!! $player->stats !!},
                    sortCol: null,
                    sortAsc: false,

                    sort(col) {
                        console.log("hey");
                        if(this.sortCol === col) this.sortAsc = !this.sortAsc;
                        this.sortCol = col;
                        this.stats.sort((a, b) => {
                            if(a[this.sortCol] < b[this.sortCol]) return this.sortAsc?1:-1;
                            if(a[this.sortCol] > b[this.sortCol]) return this.sortAsc?-1:1;
                            return 0;
                        });
                    },
    
                    getContent() {
                        this.open = !this.open
                    },
                }))
            })
        </script>

    </div>

</x-layout>
