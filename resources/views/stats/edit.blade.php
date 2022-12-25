<x-layout>
    <div class="text-center  mb-8">
        <p class="text-4xl">Edit Stat</p> 
        <p class="pt-2">Added on {{ date('M d, y', strtotime( $stat->created_at )) }}</p>
        <p class="pt-2">Last Updated on {{ date('M d, y', strtotime( $stat->created_at )) }}</p>
    </div>
    <table class="table-auto w-4/5 m-auto">
        <thead> 
            <tr class="border-b border-gray-600 border-collapse text-left">
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

        <form action="/stats/{{ $stat->id }}" method="POST">
            @csrf
            @method('PUT')
            <tbody>
                <tr>
                    <td class="p-3">
                        <input type="text" name="plate_attempts" class="bg-black" size="3" value="{{ $stat->plate_attempts }}">
                    </td>
                    <td class="p-3 border-r border-gray-600">
                        <input type="text" name="at_bats" class="bg-black" size="3" value="{{ $stat->at_bats }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="runs" class="bg-black" size="3" value="{{ $stat->runs }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="hits" class="bg-black" size="3" value="{{ $stat->hits }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="doubles" class="bg-black" size="3" value="{{ $stat->doubles }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="triples" class="bg-black" size="3" value="{{ $stat->triples }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="home_runs" class="bg-black" size="3" value="{{ $stat->home_runs }}">
                    </td>
                    <td class="p-3 border-r border-gray-600">
                        <input type="text" name="runs_batted_in" class="bg-black" size="3" value="{{ $stat->runs_batted_in }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="base_on_balls" class="bg-black" size="3" value="{{ $stat->base_on_balls }}">
                    </td>
                    <td class="p-3 border-r border-gray-600">
                        <input type="text" name="strike_outs" class="bg-black" size="3" value="{{ $stat->strike_outs }}">
                    </td>
                    <td class="p-3">
                        <input type="text" name="sacrifices" class="bg-black" size="3" value="{{ $stat->sacrifices }}">
                    </td>
                    <td class="p-3 border-r border-gray-600">
                        <input type="text" name="home_run_outs" class="bg-black" size="3" value="{{ $stat->home_run_outs }}">
                    </td>
                    <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                    <td class="px-4 py-3">{{ number_format((float)($stat->hits + $stat->base_on_balls) / $stat->at_bats, 3, '.') }}</td>
                    <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                    <td class="px-4 py-3">{{ number_format((float)$stat->hits / $stat->at_bats, 3, '.') }}</td>
                </tr>
            </tbody>
            <input type="submit" value="Submit" class="border border-black">
        </form>
    </table>
</x-layout>