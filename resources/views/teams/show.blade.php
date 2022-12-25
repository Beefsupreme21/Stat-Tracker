<x-layout>
    <div class="text-center">
        <div class="text-4xl mb-8">
            {{ $team->name }}
        </div>
        <div>
            <a href="/teams/{{ $team->name }}/players">
                <button class="text-red-500 hover:underline pr-3">
                    View/Edit Roster
                </button>
            </a>
        </div>
        <a href="/teams/{{ $team->name }}/edit">
            <button class="text-red-500 hover:underline pr-3">
                Edit Team Name
            </button>
        </a>
    
        <form method="POST" action="/teams/{{ $team->name }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:underline">
                Delete Team
            </button>
        </form>
    </div>
    <div class="min-h-full">
        <div class="mx-auto mt-8 grid max-w-3xl grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-cols-3">
          <div class="space-y-6 py-2 mt-8 md:px-6 lg:px-8 shadow sm:rounded-lg border border-black overflow-x-auto md:rounded-lg lg:col-span-3 ">
            <h2 class="text-lg font-medium text-gray-900">Total Season Stats - doesn't work</h2>

            <table class="table-auto m-auto">
              <thead> 
                <tr class="border-b border-gray-600 border-collapse text-left">
                  <th class="px-4">Player</th>
                  <th class="px-4">PA</th>
                  <th class="px-4">AB</th>
                  <th class="px-4">R</th>
                  <th class="px-4">H</th>
                  <th class="px-4">2B</th>
                  <th class="px-4">3B</th>
                  <th class="px-4">HR</th>
                  <th class="px-4">RBI</th>
                  <th class="px-4">BB</th>
                  <th class="px-4">SO</th>
                  <th class="px-4">Sac</th>
                  <th class="px-4">HRO</th>
                  <th class="px-4">AVG</th>
                  <th class="px-4">OBP</th>
                  <th class="px-4">SLG</th>
                  <th class="px-4">OPS</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($team->players as $player)
                    @foreach ($player->stats as $stat)
                    <tr>
                        <td class="px-4 py-3">{{ $stat->player->name }}</td>
                        <td class="px-4 py-3">{{ $stat->plate_attempts }}</td>
                        <td class="px-4 py-3 border-r border-gray-600">{{ $stat->at_bats }}</td>
                        <td class="px-4 py-3">{{ $stat->runs }}</td>
                        <td class="px-4 py-3">{{ $stat->hits }}</td>
                        <td class="px-4 py-3">{{ $stat->doubles }}</td>
                        <td class="px-4 py-3">{{ $stat->triples }}</td>
                        <td class="px-4 py-3">{{ $stat->home_runs }}</td>
                        <td class="px-4 py-3 border-r border-gray-600">{{ $stat->runs_batted_in }}</td>
                        <td class="px-4 py-3">{{ $stat->base_on_balls }}</td>
                        <td class="px-4 py-3 border-r border-gray-600">{{ $stat->strike_outs }}</td>
                        <td class="px-4 py-3">{{ $stat->sacrifices }}</td>
                        <td class="px-4 py-3 border-r border-gray-600">{{ $stat->home_run_outs }}</td>
                        <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                        <td class="px-4 py-3">{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
                        <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                        <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                    </tr>
                    @endforeach
                @endforeach
              </tbody>
            </table>
          </div>
    
          <div class="lg:col-span-2">
            <div class="px-4 py-5 shadow sm:rounded-lg sm:px-6 border border-black">
              <h2 class="text-lg font-medium text-gray-900">Recent Games</h2>
              <a href="/games/create/{{ $team->name }}">Add New Game</a>
              <div class="py-2 mt-8 md:px-6 lg:px-8 shadow sm:rounded-lg overflow-x-auto md:rounded-lg lg:col-span-3 ">
                @foreach ($team->games as $game)

                <div class="border-b border-black flex justify-evenly text-lg py-4">
                    <p>{{ date('M d, y', strtotime( $game->date )) }}</p>
                    <p>{{ date('g:i a', strtotime( $game->date )) }}</p>
                    <p>{{ $game->outcome }}</p>
                    <p>{{ $game->opponent }}</p>
                </div>
                <table class=" w-full">
                    <tbody> 
                      <tr class="border-b border-gray-600 border-collapse text-center">
                        <th>Player</th>
                        <th>PA</th>
                        <th>AB</th>
                        <th>R</th>
                        <th>H</th>
                        <th>2B</th>
                        <th>3B</th>
                        <th>HR</th>
                        <th>RBI</th>
                        <th>BB</th>
                        <th>SO</th>
                        <th>Sac</th>
                        <th>HRO</th>
                        <th>AVG</th>
                        <th>OBP</th>
                        <th>SLG</th>
                        <th>OPS</th>
                      </tr>

                      @foreach ($game->stats as $stat)
                      <tr class="text-center">
                        <td>{{ $stat->player->name }}</td>
                        <td>{{ $stat->plate_attempts }}</td>
                        <td class="border-r border-gray-600">{{ $stat->at_bats }}</td>
                        <td>{{ $stat->runs }}</td>
                        <td>{{ $stat->hits }}</td>
                        <td>{{ $stat->doubles }}</td>
                        <td>{{ $stat->triples }}</td>
                        <td>{{ $stat->home_runs }}</td>
                        <td class="border-r border-gray-600">{{ $stat->runs_batted_in }}</td>
                        <td>{{ $stat->base_on_balls }}</td>
                        <td class="border-r border-gray-600">{{ $stat->strike_outs }}</td>
                        <td>{{ $stat->sacrifices }}</td>
                        <td class="border-r border-gray-600">{{ $stat->home_run_outs }}</td>
                        <td>{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                        <td>{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
                        <td>{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                        <td>{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                </table>
                @endforeach

              </div>
            </div>
          </div>
    
          <div class="col-span-1">
            <div class="px-4 py-5 shadow sm:rounded-lg sm:px-6 border border-black">
              <h2 class="text-lg font-medium text-gray-900">Roster</h2>
                @foreach ($team->players as $player)
                    <div class="mt-2">
                    <a href="/players/{{ $player->name }}">
                        <button class="text-blue-500 hover:underline pr-3">
                            {{ $player->name }}
                        </button>
                    </a>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
    </div>





</x-layout>