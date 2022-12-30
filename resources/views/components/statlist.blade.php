@props(['stats'])

<table {{ $attributes }}>
    <thead class="bg-gray-200 min-w-full divide-y divide-gray-300"> 
        <tr>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Player</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Team</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">PA</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">AB</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">R</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">H</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">2B</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">3B</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">HR</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">RBI</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">BB</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SO</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">Sac</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">HRO</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">AVG</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OBP</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SLG</th>
            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OPS</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-gray-200 bg-white">
        @foreach ($stats as $stat)
            <x-statitem :stat="$stat" :team="$stat->team" :player="$stat->player" />
        @endforeach
    </tbody>
</table>