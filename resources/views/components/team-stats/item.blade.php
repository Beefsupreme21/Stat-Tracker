<tr x-data="teamStat(player)" {{ $attributes }}>
    <td class="whitespace-nowrap pl-4 pr-3 py-2 text-sm text-gray-500 sm:pl-6">
        <a :href="`/players/${player.id}`" x-text="player.name"></a>
    </td>
    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">
        <a :href="`/teams/${team.id}`" x-text="team.name"></a>
    </td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalGamesPlayed"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalPlateAttempts"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalAtBats"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalRuns"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalHits"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalDoubles"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalTriples"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalHomeRuns"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalRunsBattedIn"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalBaseOnBalls"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalStrikeOuts"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalSacrifices"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalHomeRunOuts"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalTakenBases"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalAvg"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalObp"></td>
    <td class="px-2 py-2 text-sm text-gray-500 text-right" x-text="totalSlg"></td>
    <td class="py-3.5 pl-3 pr-4 sm:pr-6 text-sm text-gray-500 text-right" x-text="totalOps"></td>
</tr>

@push('scripts')
    @once
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('teamStat', (player) => ({
                    player: player,

                    get stats() {
                        if (this.filteredSeason !== 'All') {
                            return this.player.stats.filter((stat) => {
                                return stat.game.season.id === this.filteredSeason;
                            });
                        }

                        return this.player.stats;
                    },
                    get totalGamesPlayed() {
                        return this.stats.length;
                    },
                    get totalPlateAttempts() {
                        return this.stats.reduce((a, b) => a + b.plate_attempts, 0);
                    },
                    get totalAtBats() {
                        return this.stats.reduce((a, b) => a + b.at_bats, 0);
                    },
                    get totalRuns() {
                        return this.stats.reduce((a, b) => a + b.runs, 0);
                    },
                    get totalHits() {
                        return this.stats.reduce((a, b) => a + b.hits, 0);
                    },
                    get totalDoubles() {
                        return this.stats.reduce((a, b) => a + b.doubles, 0);
                    },
                    get totalTriples() {
                        return this.stats.reduce((a, b) => a + b.triples, 0);
                    },
                    get totalHomeRuns() {
                        return this.stats.reduce((a, b) => a + b.home_runs, 0);
                    },
                    get totalRunsBattedIn() {
                        return this.stats.reduce((a, b) => a + b.runs_batted_in, 0);
                    },
                    get totalBaseOnBalls() {
                        return this.stats.reduce((a, b) => a + b.base_on_balls, 0);
                    },
                    get totalStrikeOuts() {
                        return this.stats.reduce((a, b) => a + b.strike_outs, 0);
                    },
                    get totalSacrifices() {
                        return this.stats.reduce((a, b) => a + b.sacrifices, 0);
                    },
                    get totalHomeRunOuts() {
                        return this.stats.reduce((a, b) => a + b.home_run_outs, 0);
                    },
                    get totalTakenBases() {
                        return (this.totalHits - this.totalDoubles - this.totalTriples - this.totalHomeRuns) + (this.totalDoubles * 2 + this.totalTriples * 3 + this.totalHomeRuns * 4);
                    },
                    get totalAvg() {
                        return Number.parseFloat(this.totalHits / this.totalAtBats).toFixed(3);
                    },
                    get totalObp() {
                        return Number.parseFloat((this.totalHits + this.totalBaseOnBalls) / this.totalPlateAttempts).toFixed(3);
                    },
                    get totalSlg() {
                        return Number.parseFloat(this.totalTakenBases / this.totalAtBats).toFixed(3);
                    },
                    get totalOps() {
                        return Number.parseFloat((this.totalHits + this.totalBaseOnBalls) / this.totalPlateAttempts + (this.totalTakenBases / this.totalAtBats)).toFixed(3);
                    },
                }));
            });
        </script>
    @endonce
@endpush
