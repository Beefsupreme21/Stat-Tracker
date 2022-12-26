@props(['stats'])

<table {{ $attributes }}>
    <thead> 
        <tr class="border-b border-gray-600 border-collapse text-left">
            <th class="px-4">Player</th>
            <th class="px-4">Team</th>
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
        @foreach ($stats as $stat)
            <x-statitem :stat="$stat" />
        @endforeach
    </tbody>
</table>