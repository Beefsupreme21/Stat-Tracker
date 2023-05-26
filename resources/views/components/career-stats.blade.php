@props(['player'])

<div x-data="careerStats" class="mt-8 -my-2 -mx-4 overflow-x-auto sm:-mx-6 md:px-6 lg:px-8 lg:-mx-8">
    <div class="inline-block min-w-full py-2 align-middle">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Career Stats</h2>
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th scope="col" class="whitespace-nowrap pl-3 pr-1 py-3.5 text-right text-sm font-semibold text-gray-900">G</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">AVG</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OBP</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SLG</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">OPS</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">ISO</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">RC</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">RC/G</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">BABIP</th>
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
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">SAC</th>
                        <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-right text-sm font-semibold text-gray-900">HRO</th>
                        <th scope="col" class="whitespace-nowrap pl-2 pr-3 py-3.5 text-right text-sm font-semibold text-gray-900">TB</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr x-show="totalStats.games_played">
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.games_played"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.avg"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.obp"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.slg"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.ops"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.iso"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.rc"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.rcg"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.babip"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.plate_attempts"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.at_bats"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.runs"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.hits"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.doubles"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.triples"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.home_runs"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.runs_batted_in"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.base_on_balls"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.strike_outs"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.sacrifices"></td>
                        <td class="px-1 py-2 text-sm text-gray-500 text-right" x-text="totalStats.home_run_outs"></td>
                        <td class="py-2 pl-1 pr-3 text-sm text-gray-500 text-right" x-text="totalStats.taken_bases"></td>
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
                const games_played = this.playerStats.length;
                const plate_attempts = this.playerStats.reduce((a, b) => a + b.plate_attempts, 0);
                const at_bats = this.playerStats.reduce((a, b) => a + b.at_bats, 0);
                const runs = this.playerStats.reduce((a, b) => a + b.runs, 0);
                const hits = this.playerStats.reduce((a, b) => a + b.hits, 0);
                const doubles = this.playerStats.reduce((a, b) => a + b.doubles, 0);
                const triples = this.playerStats.reduce((a, b) => a + b.triples, 0);
                const home_runs = this.playerStats.reduce((a, b) => a + b.home_runs, 0);
                const runs_batted_in = this.playerStats.reduce((a, b) => a + b.runs_batted_in, 0);
                const base_on_balls = this.playerStats.reduce((a, b) => a + b.base_on_balls, 0);
                const strike_outs = this.playerStats.reduce((a, b) => a + b.strike_outs, 0);
                const sacrifices = this.playerStats.reduce((a, b) => a + b.sacrifices, 0);
                const home_run_outs = this.playerStats.reduce((a, b) => a + b.home_run_outs, 0);
                const taken_bases = (hits - doubles - triples - home_runs) + (doubles * 2 + triples * 3 + home_runs * 4);
                const avg = at_bats ? Number.parseFloat(hits / at_bats).toFixed(3) : '0.000';
                const obp = Number.parseFloat((hits + base_on_balls) / plate_attempts).toFixed(3);
                const slg = at_bats ? Number.parseFloat(taken_bases / at_bats).toFixed(3) : '0.000';
                const ops = at_bats ? Number.parseFloat((hits + base_on_balls) / plate_attempts + (taken_bases / at_bats)).toFixed(3) : Number.parseFloat((hits + base_on_balls) / plate_attempts).toFixed(3);
                const iso = Number.parseFloat(slg - avg).toFixed(3);
                const rc = Number.parseFloat((hits + base_on_balls) * taken_bases / (at_bats + base_on_balls)).toFixed(0);
                const rcg = Number.parseFloat(rc / games_played).toFixed(1);
                const babip = (at_bats - strike_outs - home_runs - home_run_outs + sacrifices) ? Number.parseFloat((hits - home_runs) / (at_bats - strike_outs - home_runs - home_run_outs + sacrifices)).toFixed(3) : '0.000';

                return {
                    games_played: games_played,
                    plate_attempts: plate_attempts,
                    at_bats: at_bats,
                    runs: runs,
                    hits: hits,
                    doubles: doubles,
                    triples: triples,
                    home_runs: home_runs,
                    runs_batted_in: runs_batted_in,
                    base_on_balls: base_on_balls,
                    strike_outs: strike_outs,
                    sacrifices: sacrifices,
                    home_run_outs: home_run_outs,
                    taken_bases: taken_bases,
                    avg: avg,
                    obp: obp,
                    slg: slg,
                    ops: ops,
                    iso: iso,
                    rc: rc,
                    rcg: rcg,
                    babip: babip,
                };
            },
            
        }))
    })
</script>
