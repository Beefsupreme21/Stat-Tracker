<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamPlayerController;
use App\Http\Controllers\PlayerTeamController;


Route::get('/test', function () {
    return view('test');
});

Route::get('/', [TeamController::class, 'index']);


Route::get('/teams', [TeamController::class, 'index']);
Route::get('/teams/create', [TeamController::class, 'create']);
Route::post('/teams', [TeamController::class, 'store']);
Route::get('/teams/{team:name}/edit', [TeamController::class, 'edit']);
Route::put('/teams/{team}', [TeamController::class, 'update']);
Route::delete('/teams/{team:name}', [TeamController::class, 'destroy']);
Route::get('/teams/{team:name}', [TeamController::class, 'show']);

Route::get('/players', [PlayerController::class, 'index']);
Route::get('/players/create', [PlayerController::class, 'create']);
Route::post('/players', [PlayerController::class, 'store']);
Route::get('/players/{player}/edit', [PlayerController::class, 'edit']);
Route::put('/players/{player}', [PlayerController::class, 'update']);
Route::delete('/players/{player}', [PlayerController::class, 'destroy']);
Route::get('/players/{player}', [PlayerController::class, 'show']);

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/create', [GameController::class, 'create']);
Route::post('/games', [GameController::class, 'store']);
Route::get('/games/{game}/edit', [GameController::class, 'edit']);
Route::put('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class, 'destroy']);
Route::get('/games/{game}', [GameController::class, 'show']);

Route::get('/stats', [StatController::class, 'index']);
Route::get('/stats/create', [StatController::class, 'create']);
Route::post('/stats', [StatController::class, 'store']);
Route::get('/stats/{stat}/edit', [StatController::class, 'edit']);
Route::put('/stats/{stat}', [StatController::class, 'update']);
Route::delete('/stats/{stat}', [StatController::class, 'destroy']);
Route::get('/stats/{stat}', [StatController::class, 'show']);

Route::get('/teams/{team:name}/players', [TeamPlayerController::class, 'index']);
Route::post('/teams/{team:name}/players', [TeamPlayerController::class, 'store']);
Route::delete('/teams/{team:name}/players/{player:name}', [TeamPlayerController::class, 'destroy']);
Route::get('/players/{player:name}/teams', [PlayerTeamController::class, 'index']);
Route::post('/players/{player:name}/teams', [PlayerTeamController::class, 'store']);
Route::delete('/players/{player:name}/teams/{team:name}', [PlayerTeamController::class, 'destroy']);

Route::post('/players/search', function() {
    return redirect('/players?search=' . request('search'));
});