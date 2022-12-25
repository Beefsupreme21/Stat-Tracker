<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained();
            $table->foreignId('player_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->integer('plate_attempts');
            $table->integer('at_bats');
            $table->integer('runs');
            $table->integer('hits');
            $table->integer('doubles');
            $table->integer('triples');
            $table->integer('home_runs');
            $table->integer('runs_batted_in');
            $table->integer('base_on_balls');
            $table->integer('strike_outs');
            $table->integer('sacrifices');
            $table->integer('home_run_outs');
            $table->timestamps();

            $table->unique(['game_id', 'player_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stats');
    }
};
