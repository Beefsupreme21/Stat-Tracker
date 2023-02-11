@props(['player'])

<div x-data="careerStats">
    <h2>Career Stats</h2>
    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>G</th>
                <th>AB</th>
                <th>R</th>
                <th>H</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(year, index) in years" :key="index">
                <tr>
                    <td x-text="year"></td>
                    <td x-text="statsByYear[year].games_played"></td>
                    <td x-text="statsByYear[year].plate_attempts"></td>
                    <td x-text="statsByYear[year].at_bats"></td>
                    <td x-text="statsByYear[year].runs"></td>
                </tr>
            </template>
            <template x-for="stat in statsByYear">
                <tr>
                    <td x-text="statsByYear.games_played"></td>
                    <td x-text="statsByYear.plate_attempts"></td>
                    <td x-text="statsByYear.at_bats"></td>
                    <td x-text="statsByYear.runs"></td>
                </tr>
            </template>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('careerStats', () => ({
            playerStats: @json($player->stats),

            get years() {
                return [...new Set(this.playerStats.map(stat => stat.game.date.slice(0, 4)))];
            },

            get statsByYear() {
                let stats = {};

                this.years.forEach(year => {
                    stats[year] = {
                        games_played: this.playerStats.filter(stat => stat.game.date.slice(0, 4) === year).length,
                        plate_attempts: this.playerStats.filter(stat => stat.game.date.slice(0, 4) === year).reduce((a, b) => a + b.plate_attempts, 0),
                        at_bats: this.playerStats.filter(stat => stat.game.date.slice(0, 4) === year).reduce((a, b) => a + b.at_bats, 0),
                        runs: this.playerStats.filter(stat => stat.game.date.slice(0, 4) === year).reduce((a, b) => a + b.runs, 0),
                    }
                });

                return stats;
            }
        }))
    })
</script>

