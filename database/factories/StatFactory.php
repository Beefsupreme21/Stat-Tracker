<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Team;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stat>
 */
class StatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $playerIds = Player::pluck('id')->toArray();
        $teamIds = Team::pluck('id')->toArray();
        $gameIds = Game::pluck('id')->toArray();


        return [
            'game_id' => $gameIds[array_rand($gameIds)],
            'player_id' => $playerIds[array_rand($playerIds)],
            'team_id' => $teamIds[array_rand($teamIds)],
            'plate_attempts' => fake()->numberBetween(127,132),
            'at_bats' => fake()->numberBetween(115,127),
            'runs' => fake()->numberBetween(45,65),
            'hits' => fake()->numberBetween(66,80),
            'doubles' => fake()->numberBetween(16,21),
            'triples' => fake()->numberBetween(5,11),
            'home_runs' => fake()->numberBetween(1,8),
            'runs_batted_in' => fake()->numberBetween(34,75),
            'base_on_balls' => fake()->numberBetween(6,12),
            'strike_outs' => fake()->numberBetween(1,9),
            'sacrifices' => fake()->numberBetween(1,4),
            'home_run_outs' => fake()->numberBetween(1,3),
        ];
    }
}
