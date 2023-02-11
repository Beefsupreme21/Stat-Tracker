@props(['player'])

<div x-data="careerStats" class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Career Stats</h2>
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">G</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">AB</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">R</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">H</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">2B</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">3B</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">HR</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">RBI</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">BB</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">SO</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Sac</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">HRO</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">TB</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">AVG</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">OBP</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">SLG</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">OPS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.games_played"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.at_bats"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.runs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.hits"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.doubles"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.triples"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.home_runs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.runs_batted_in"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.base_on_balls"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.strike_outs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.sacrifices"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.home_run_outs"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.taken_bases"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.avg"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.obp"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.slg"></td>
                        <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900" x-text="totalStats.ops"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('careerStats', () => ({
            playerStats: @json($player->stats),

            get totalStats() {
                let statTotals = {
                    games_played: this.playerStats.length,
                    plate_attempts: this.playerStats.reduce((a, b) => a + b.plate_attempts, 0),
                    at_bats: this.playerStats.reduce((a, b) => a + b.at_bats, 0),
                    runs: this.playerStats.reduce((a, b) => a + b.runs, 0),
                    hits: this.playerStats.reduce((a, b) => a + b.hits, 0),
                    doubles: this.playerStats.reduce((a, b) => a + b.doubles, 0),
                    triples: this.playerStats.reduce((a, b) => a + b.triples, 0),
                    home_runs: this.playerStats.reduce((a, b) => a + b.home_runs, 0),
                    runs_batted_in: this.playerStats.reduce((a, b) => a + b.runs_batted_in, 0),
                    base_on_balls: this.playerStats.reduce((a, b) => a + b.base_on_balls, 0),
                    strike_outs: this.playerStats.reduce((a, b) => a + b.strike_outs, 0),
                    sacrifices: this.playerStats.reduce((a, b) => a + b.sacrifices, 0),
                    home_run_outs: this.playerStats.reduce((a, b) => a + b.home_run_outs, 0),
                };

                let taken_bases = (statTotals.hits - statTotals.doubles - statTotals.triples - statTotals.home_runs) + (statTotals.doubles * 2 + statTotals.triples * 3 + statTotals.home_runs * 4);

                let calculatedTotals = {
                    avg: Number.parseFloat(statTotals.hits / statTotals.at_bats).toFixed(3),
                    obp: Number.parseFloat((statTotals.hits + statTotals.base_on_balls) / statTotals.plate_attempts).toFixed(3),
                    slg: Number.parseFloat((statTotals.hits + statTotals.doubles + statTotals.triples + statTotals.home_runs) / statTotals.at_bats).toFixed(3),
                    ops: Number.parseFloat((statTotals.hits + statTotals.base_on_balls) / statTotals.plate_attempts + ((statTotals.hits - statTotals.doubles - statTotals.triples - statTotals.home_runs) + (statTotals.doubles * 2 + statTotals.triples * 3 + statTotals.home_runs * 4) / statTotals.at_bats)).toFixed(3),
                };

                return {
                    ...statTotals,
                    taken_bases: taken_bases,
                    ...calculatedTotals,
                };
            },
            
        }))
    })
</script>
