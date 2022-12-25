<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Bulls', 
                'Penguins', 
                'Raptors',
                'Dolphins', 
                'Cardinals', 
                'Wolves',
                'Ravens', 
                'Hornets', 
                'Sharks',
                'Panthers',
                'Falcons', 
                'Tigers', 
                'Rams',
                'Ducks', 
                'Coyotes', 
                'Lions',
                'Scorpions', 
                'Otters', 
                'Jaguars',
                'Dragons',
            ]),
        ];
    }
}
