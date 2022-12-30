<?php

use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PlayerTeamController;
use App\Http\Controllers\TeamPlayerController;


Route::get('/test', function () {
    $teams = Team::all();

    return view('test', [
        'teams' => $teams, 
    ]);
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

Route::resource('/stats', StatController::class);

Route::get('/teams/{team}/players', [TeamPlayerController::class, 'index']);
Route::post('/teams/{team}/players', [TeamPlayerController::class, 'store']);
Route::delete('/teams/{team}/players/{player:name}', [TeamPlayerController::class, 'destroy']);
Route::get('/players/{player:name}/teams', [PlayerTeamController::class, 'index']);
Route::post('/players/{player:name}/teams', [PlayerTeamController::class, 'store']);
Route::delete('/players/{player:name}/teams/{team:name}', [PlayerTeamController::class, 'destroy']);

Route::post('/players/search', function() {
    return redirect('/players?search=' . request('search'));
});