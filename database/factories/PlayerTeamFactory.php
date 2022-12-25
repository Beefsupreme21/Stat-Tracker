<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlayerTeam>
 */
class PlayerTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teamIds = Team::pluck('id')->toArray();
        $playerIds = Player::pluck('id')->toArray();

        return [
            'player_id' => $playerIds[array_rand($playerIds)],
            'team_id' => $teamIds[array_rand($teamIds)],
        ];
    }
}
