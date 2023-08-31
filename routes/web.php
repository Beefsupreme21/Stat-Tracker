<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerTeamController;
use App\Http\Controllers\TeamPlayerController;


Route::get('/', [TeamController::class, 'index']);

Route::resource('/teams', TeamController::class);
Route::resource('/players', PlayerController::class);
Route::resource('/games', GameController::class);
Route::resource('/stats', StatController::class)->except(['index', 'show']);

Route::get('/teams/{team}/players', [TeamPlayerController::class, 'index']);
Route::post('/teams/{team}/players', [TeamPlayerController::class, 'store']);
Route::delete('/teams/{team}/players/{player}', [TeamPlayerController::class, 'destroy']);
Route::get('/players/{player}/teams', [PlayerTeamController::class, 'index']);
Route::post('/players/{player}/teams', [PlayerTeamController::class, 'store']);
Route::delete('/players/{player}/teams/{team}', [PlayerTeamController::class, 'destroy']);

Route::post('/players/search', function() {
    return redirect('/players?search=' . request('search'));
});