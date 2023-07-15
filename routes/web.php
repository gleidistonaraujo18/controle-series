<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



Route::resource('/series', SeriesController::class)
    ->except(['show']);

Route::middleware('autenticador')->group(function () {
    Route::get('/', function () {
        return redirect('/series');
    });

    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'store'])->name('signin');

Route::get('/registrar', [UsersController::class, 'create'])->name('users.create');

Route::post('/registrar', [UsersController::class, 'store'])->name('users.create');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
