<?php

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/series', \App\Http\Controllers\Api\SeriesController::class);
/* Pegar as temporadas de uma serie */
Route::get('/series/{series}/seasons', function (Series $series) {
    return $series->seasons;
});

Route::get('/series/{series}/episodes', function (Series $series, Episode $episode) {
    return $series->episodes;
});

Route::patch('/episodes/{episode}', function (Episode $episode, Request $request) {
    $episode->watched = $request->watched;
    $episode->save();

    return $episode;
});
