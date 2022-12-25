<?php

namespace Database\Seeders;

use App\Models\PlayerTeam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlayerTeam::factory()
            ->count(100) // 20K posts
            ->create();    
    }
}
