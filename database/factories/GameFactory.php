<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $teamIds = Team::pluck('name')->toArray();

        return [
            'date' => fake()->dateTimeThisYear(),
            'location' => fake()->city(),
            'umpire' => fake()->firstName(),
            'weather' => fake()->randomElement(['Sunny', 'Rain', 'Cloudy']), 
            'opponent' => $teamIds[array_rand($teamIds)],
        ];
    }
}
