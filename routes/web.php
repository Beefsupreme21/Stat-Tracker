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


Route::resource('/teams', TeamController::class);

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
Route::delete('/teams/{team}/players/{player}', [TeamPlayerController::class, 'destroy']);
Route::get('/players/{player}/teams', [PlayerTeamController::class, 'index']);
Route::post('/players/{player}/teams', [PlayerTeamController::class, 'store']);
Route::delete('/players/{player}/teams/{team}', [PlayerTeamController::class, 'destroy']);

Route::post('/players/search', function() {
    return redirect('/players?search=' . request('search'));
});